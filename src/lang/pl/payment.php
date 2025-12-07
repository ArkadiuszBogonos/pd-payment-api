<?php

return [
    'amount_required' => 'Pole amount jest wymagane.',
    'amount_integer' => 'Kwota (pole amount) jest przechowywane w centach, należy podać liczbę całkowitą. Przykładowo kwota 90,95 powinna być przesłana jako 9095.',
    'amount_min' => 'Pole amount musi być liczbą całkowitą większą niż 0.',

    'type_required' => 'Pole type jest wymagane.',
    'type_invalid' => 'Pole type musi zawierać jedną z następujących wartości: :available_types.',

    'card_required' => 'Pole creditCard jest wymagane.',
    'card_between' => 'Pole creditCard musi zawierać numer karty o długości od 13 do 19 cyfr.',

    'cvv_required' => 'Pole cvv jest wymagane.',
    'cvv_between' => 'Pole cvv musi zawierać 3 lub 4 cyfry.',

    'mock_payment_error' => 'Serwis testowy (mock) zwrócił błąd płatności.',
    'payment_failed' => 'Wystąpił błąd podczas przetwarzania płatności.',
];
