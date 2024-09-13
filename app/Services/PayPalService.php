<?php

// app/Services/PayPalService.php

namespace App\Services;

use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Core\LiveEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;

class PayPalService
{
    private $client;

    public function __construct()
    {
        $environment = new SandboxEnvironment(config('paypal.client_id'), config('paypal.client_secret'));
        // Use LiveEnvironment for production
        $this->client = new PayPalHttpClient($environment);
    }

    public function createOrder($amount)
    {
        $request = new OrdersCreateRequest();
        $request->prefer('return=representation');
        $request->body = [
            'intent' => 'CAPTURE',
            'purchase_units' => [
                [
                    'amount' => [
                        'currency_code' => 'USD',
                        'value' => $amount
                    ]
                ]
            ]
        ];

        try {
            $response = $this->client->execute($request);
            return $response;
        } catch (\Exception $e) {
            // Handle exception
            return $e->getMessage();
        }
    }

    public function captureOrder($orderId)
    {
        $request = new OrdersCaptureRequest($orderId);
        $request->prefer('return=representation');

        try {
            $response = $this->client->execute($request);
            return $response;
        } catch (\Exception $e) {
            // Handle exception
            return $e->getMessage();
        }
    }
}
