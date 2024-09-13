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
        Log::info('Processing payment request', $request->all());

        $amount = $request->input('amount', '10.00'); // Default amount if not provided

        $request->validate([
            'amount' => 'required|numeric|min:0.01',
        ]);

        $createOrderRequest = new OrdersCreateRequest();
        $createOrderRequest->prefer('return=representation');
        $createOrderRequest->body = [
            'intent' => 'CAPTURE',
            'purchase_units' => [
                [
                    'amount' => [
                        'currency_code' => 'MXN',
                        'value' => number_format((float)$amount, 2, '.', ''),
                    ],
                ],
            ],
            'application_context' => [
                'return_url' => route('payment.success'),
                'cancel_url' => route('payment.cancel'),
            ],
        ];

        try {
            $response = $this->client->execute($createOrderRequest);
            Log::info('PayPal Response:', $response->result);

            $approvalUrl = collect($response->result->links)->firstWhere('rel', 'approve')->href;

            if ($approvalUrl) {
                return redirect($approvalUrl);
            } else {
                Log::error('PayPal approval URL not found.');
                return redirect()->route('payment.cancel')->with('error', 'Payment approval URL not found.');
            }
        } catch (\Exception $ex) {
            Log::error('PayPal Order Creation Error: ' . $ex->getMessage());
            return redirect()->route('payment.cancel')->with('error', 'An error occurred while processing the payment. Please try again later.');
        }
    }

    public function paymentSuccess(Request $request)
    {
        $paymentId = $request->query('token'); // Adjust the query parameter name based on PayPal's response
        $payerId = $request->query('PayerID');

        if (!$paymentId || !$payerId) {
            return redirect()->route('payment.cancel')->with('error', 'Invalid payment details.');
        }

        $captureRequest = new OrdersCaptureRequest($paymentId);
        $captureRequest->body = [];

        try {
            $response = $this->client->execute($captureRequest);
            $order = $response->result;

            $user = Auth::user();
            $amount = $order->purchase_units[0]->amount->value;
            $credit = $amount; // Adjust this logic if needed

            DB::transaction(function () use ($user, $credit, $order) {

                Payment::create([
                    'user_id' => $user->id,
                    'amount' => $credit,
                    'transaction_id' => $order->id,
                    'status' => 'completed',
                ]);
            });

            return view('payment-status')->with('isSuccess', true);
        } catch (\Exception $ex) {
            Log::error('PayPal Payment Capture Error: ' . $ex->getMessage());
            return redirect()->route('payment.cancel')->with('error', 'Payment capture failed. Please try again later.');
        }
    }

    public function paymentCancel(Request $request)
    {
        $orderId = $request->query('orderId'); // Adjust the query parameter name based on PayPal's response

        if ($orderId) {
            // Log the canceled payment attempt
            Payment::create([
                'user_id' => Auth::id(), // You may need to handle the user ID if the user is not logged in
                'amount' => 0, // Set to 0 or handle accordingly
                'transaction_id' => $orderId,
                'status' => 'canceled',
            ]);
        }

        return view('payment-status')->with('isSuccess', false);
    }
}
