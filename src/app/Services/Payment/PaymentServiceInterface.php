<?php

namespace App\Services\Payment;

use App\Services\Payment\DTOs\PaymentDTO;
use App\Services\Payment\Exceptions\PaymentException;

interface PaymentServiceInterface
{
    /**
     * @throws PaymentException
     */
    public function processPayment(PaymentDTO $paymentDTO): array; // TODO: return Laravel Resource
}
