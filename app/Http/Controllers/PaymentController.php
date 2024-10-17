<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    private $client;

    public function __construct()
    {
        $environment = new SandboxEnvironment(config('services.paypal.client_id'), config('services.paypal.secret'));
        $this->client = new PayPalHttpClient($environment);
    }

    public function showMakePaymentForm()
    {
        return view('make-payment');
    }

    public function processPayment(Request $request)
    {
        Log::info('Processing payment request', ['request_data' => $request->all()]);

        $amount = $request->input('amount', '10.00'); // Default amount if not provided

        $request->validate([
            'amount' => 'required|numeric|min:0.01',
        ]);

        $payment = new Payment();
        $payment->user_id = Auth::id();
        $payment->amount = $amount;
        $payment->status = 'Pending';
        $payment->save();

        $createOrderRequest = new OrdersCreateRequest();
        $createOrderRequest->prefer('return=representation');
        $createOrderRequest->body = [
            'intent' => 'CAPTURE',
            'purchase_units' => [
                [
                    'amount' => [
                        'currency_code' => 'USD',
                        'value' => number_format((float) $amount, 2, '.', ''),
                    ],
                ],
            ],
            'application_context' => [
                'return_url' => route('payment.success', ['payment_id' => $payment->id]),
                'cancel_url' => route('payment.cancel'),
            ],
        ];

        try {
            $response = $this->client->execute($createOrderRequest);
            Log::info('PayPal Response:', ['response_data' => (array) $response->result]);

            $approvalUrl = collect($response->result->links)->firstWhere('rel', 'approve')->href;

            if ($approvalUrl) {
                return redirect($approvalUrl);
            } else {
                $payment->status = 'Failed';
                $payment->log = 'Payment approval URL not found.';
                $payment->save();
                Log::error('PayPal approval URL not found.');
                return redirect()->route('payment.cancel')->with('error', 'Payment approval URL not found.');
            }
        } catch (\Exception $e) {
            $payment->status = 'Failed';
            $payment->log = 'Error creating PayPal order: ' . $e->getMessage();
            $payment->save();
            Log::error('Error creating PayPal order: ' . $e->getMessage());
            return redirect()->route('payment.cancel')->with('error', 'An error occurred while creating the PayPal order.');
        }
    }


    public function handlePaymentSuccess(Request $request)
    {
        $orderId = $request->query('token'); // Get the order ID from the query string

        $payment = Payment::where('id', $request->query('payment_id'))->first();

        $captureOrderRequest = new OrdersCaptureRequest($orderId);
        $captureOrderRequest->prefer('return=representation');

        try {
            $response = $this->client->execute($captureOrderRequest);
            Log::info('PayPal Capture Response:', ['response_data' => (array) $response->result]);

            // Handle the response and update the database
            $payment->amount = $response->result->purchase_units[0]->amount->value;
            $payment->status = $response->result->status;
            $payment->log = 'Payment captured successfully.';
            $payment->save();

            // Redirect to a success page
            return redirect()->route('payment.success')->with('success', 'Payment completed successfully.');

        } catch (\Exception $e) {
            $payment->status = 'Failed';
            $payment->log = 'Error capturing PayPal order: ' . $e->getMessage();
            $payment->save();
            Log::error('Error capturing PayPal order: ' . $e->getMessage());
            return redirect()->route('payment.cancel')->with('error', 'An error occurred while capturing the PayPal order.');
        }
    }


    public function handlePaymentCancel()
    {
        return view('payment-cancel');
    }


    public function getPayments()
    {
        // Get the currently authenticated user
        $user = Auth::user();
        
        // Fetch payments only for this user
        $payments = Payment::where('user_id', $user->id)->get();
        
        return response()->json($payments);
    }
}
