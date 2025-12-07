<?php

namespace App\Services\Payment\Strategies;

use App\Services\Payment\AbstractPaymentService;
use App\Services\Payment\DTOs\PaymentDTO;
use Illuminate\Support\Str;

final readonly class FastPayment extends AbstractPaymentService
{
    public function processPayment(PaymentDTO $paymentDTO): array
    {
        $id = Str::uuid()->toString();
        $status = 'success';

        return $this->baseResponse($id, $status);
    }
}
