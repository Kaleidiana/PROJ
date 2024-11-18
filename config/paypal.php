<?php
/**
 * PayPal Setting & API Credentials
 * Created by Raza Mehdi <srmk@outlook.com>.
 */

return [
    'mode'    => env('PAYPAL_MODE', 'sandbox'), // 'live' for production
    'sandbox' => [
        'client_id'     => env('AQyUZmnWUujpFqbbaXQtyD8rDG-Gl9XoLg7XJpcIDR7J3C2lJH9_0DAA9SEfEjR9UD05M7VPUa6SUZOS', 'your-sandbox-client-id'),
        'client_secret' => env('EDcHvlDypXu6CTois6H4k7KJNgl4__6OVYhOFOO4UG41pS_rNdNXNmKi7HH_5EuJEp2GHtN_qqZix3Cv', 'your-sandbox-secret'),
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

