<?php

return [
    'amount_required' => 'The amount field is required.',
    'amount_integer' => 'The amount is stored in cents, you have to pass integer number. For example the amount of 90.95 should be sent as 9095',
    'amount_min' => 'The amount field has to be an integer bigger than 0.',

    'type_required' => 'The type field is required',
    'type_invalid' => 'The type field must contain one of the following values: :available_types.',

    'card_required' => 'The creditCard field is required.',
    'card_between' => 'The creditCard field must contain a card number between 13 and 19 digits long.',

    'cvv_required' => 'The CVV field is required.',
    'cvv_between' => 'The CVV field has to be 3 or 4 digit number.',

    'mock_payment_error' => 'The test service (mock) returned a payment error.',
    'payment_failed' => 'An error occurred while processing the payment.',
];
