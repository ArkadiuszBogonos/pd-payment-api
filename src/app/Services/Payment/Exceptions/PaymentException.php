<?php

namespace App\Services\Payment\Exceptions;

use Exception;

final class PaymentException extends Exception
{
    private const int HTTP_BAD_REQUEST = 400;
    public function __construct()
    {
        parent::__construct(__('payment.mock_payment_error'), self::HTTP_BAD_REQUEST);
    }
}
