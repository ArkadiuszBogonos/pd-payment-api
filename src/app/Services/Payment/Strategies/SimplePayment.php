<?php

namespace App\Services\Payment\Strategies;

use App\Services\Payment\AbstractPaymentService;
use App\Services\Payment\DTOs\PaymentDTO;
use Illuminate\Support\Str;

final readonly class SimplePayment extends AbstractPaymentService
{
    public function processPayment(PaymentDTO $paymentDTO): array
    {
        $id = Str::uuid()->toString();
        $status = 'pending';

        return $this->baseResponse($id, $status);
    }
}
