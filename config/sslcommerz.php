<?php

// SSLCommerz configuration

$apiDomain = env('SSLCZ_TESTMODE') ? "https://sandbox.sslcommerz.com" : "https://securepay.sslcommerz.com";
return [
    'apiCredentials' => [
        'store_id' => env('SSLCZ_STORE_ID', ''),
        'store_password' => env('SSLCZ_STORE_PASSWORD', ''),
    ],
    'apiDomain' => env('SSLCOMMERZ_API_DOMAIN', 'https://sandbox.sslcommerz.com'), // Use the correct API domain
    'testMode' => env('SSLCOMMERZ_TESTMODE', false),
	'apiUrl' => [
		'make_payment' => "/gwprocess/v4/api.php",
		'transaction_status' => "/validator/api/merchantTransIDvalidationAPI.php",
		'order_validate' => "/validator/api/validationserverAPI.php",
		'refund_payment' => "/validator/api/merchantTransIDvalidationAPI.php",
		'refund_status' => "/validator/api/merchantTransIDvalidationAPI.php",
	],
	'apiDomain' => $apiDomain,
	'connect_from_localhost' => env("IS_LOCALHOST", false), // For Sandbox, use "true", For Live, use "false"
	'success_url' => '/success',
	'failed_url' => '/fail',
	'cancel_url' => '/cancel',
	'ipn_url' => '/ipn',
];
