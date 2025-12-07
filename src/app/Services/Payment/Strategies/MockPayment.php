<?php

namespace App\Services\Payment\Strategies;

use App\Services\Payment\AbstractPaymentService;
use App\Services\Payment\DTOs\PaymentDTO;
use App\Services\Payment\Exceptions\PaymentException;

final readonly class MockPayment extends AbstractPaymentService
{
    /**
     * @throws PaymentException
     */
    public function processPayment(PaymentDTO $paymentDTO): array
    {
        throw new PaymentException();
    }
}
