<?php
/**
 * PayPal Setting & API Credentials
 * Created by Raza Mehdi <srmk@outlook.com>.
 */

return [
    'mode'    => env('PAYPAL_MODE', 'sandbox'), // 'live' for production
    'sandbox' => [
        'client_id'     => env('PAYPAL_SANDBOX_CLIENT_ID', 'your-sandbox-client-id'),
        'client_secret' => env('PAYPAL_SANDBOX_CLIENT_SECRET', 'your-sandbox-secret'),
        'app_id'        => 'your-sandbox-app-id',
    ],
    'live' => [
        'client_id'     => env('PAYPAL_LIVE_CLIENT_ID', 'your-live-client-id'),
        'client_secret' => env('PAYPAL_LIVE_CLIENT_SECRET', 'your-live-secret'),
        'app_id'        => 'your-live-app-id',
    ],
    'payment_action' => 'Sale',
    'currency'       => env('PAYPAL_CURRENCY', 'USD'),
    'notify_url'     => env('PAYPAL_NOTIFY_URL', ''),
    'locale'         => 'en_US',
    'validate_ssl'   => true,
];

