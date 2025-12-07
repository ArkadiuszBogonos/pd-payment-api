<?php
return [
    'urls' => [
        'fast' => env('FAST_PAYMENT_URL', 'https://fast.example/pay'),
        'simple' => env('SIMPLE_PAYMENT_URL', 'https://simple.example/pay'),
    ],
];
