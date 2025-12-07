<?php

return [
    'amount_invalid' => 'The amount field is required and must be an integer. For example, the amount 90.95 PLN should be sent as 9095.',
    'type_invalid' => 'The type field is required and must contain one of the following values: fast, simple, mock.',
    'card_invalid' => 'The cardNumber field is required and must contain a valid card number.',
    'cvv_invalid' => 'The CVV field is required and must contain a valid CVV code.',
    'mock_payment_error' => 'The test service (mock) returned a payment error.',
    'payment_failed' => 'An error occurred while processing the payment.',
];
