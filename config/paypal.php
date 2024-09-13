<?php
// config/paypal.php

return [
    'client_id' => env('PAYPAL_CLIENT_ID'),
    'client_secret' => env('PAYPAL_CLIENT_SECRET'),
    'mode' => env('PAYPAL_SANDBOX', true) ? 'sandbox' : 'live',
];
