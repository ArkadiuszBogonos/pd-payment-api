<?php

// TODO: przekazanie dostępnych typów
return [
    'amount_invalid' => 'Pole amount jest wymagane i musi być liczbą całkowitą. Przykładowo kwota 90,95 PLN powinna być wysłana jako 9095.',
    'type_invalid' => 'Pole type jest wymagane i musi zawierać jedną z następnujących wartości: fast, simple, mock.',
    'card_invalid' => 'Pole cardNumber jest wymagane i musi zawierać poprawny numer karty.',
    'cvv_invalid' => 'Pole CVV jest wymagane i musi zawierać poprawny kod CVV.',
    'mock_payment_error' => 'Usługa testowa (mock) zwróciła błąd płatności.',
    'payment_failed' => 'Wystąpił błąd podczas przetwarzania płatności.',
];
