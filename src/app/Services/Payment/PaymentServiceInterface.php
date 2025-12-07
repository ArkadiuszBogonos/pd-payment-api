<?php

declare(strict_types=1);

namespace App\Services\Payment;

use App\Models\Payment;
use App\Services\Payment\DTOs\PaymentDTO;
use App\Services\Payment\Exceptions\PaymentException;

interface PaymentServiceInterface
{
    /**
     * @throws PaymentException
     */
    public function processPayment(PaymentDTO $paymentDTO): Payment;
}
