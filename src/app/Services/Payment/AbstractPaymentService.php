<?php

namespace App\Services\Payment;

use App\Models\Payment;
use App\Services\Payment\DTOs\PaymentDTO;
use App\Services\Payment\Enums\PaymentStatus;

readonly abstract class AbstractPaymentService implements PaymentServiceInterface
{
    public function __construct(
        protected ?string $paymentUrl = null
    ) {
    }

    protected function storePayment(string $id, PaymentStatus $status, PaymentDTO $paymentDTO): Payment
    {
        // For more complicated database operation I would use a PaymentRepository to handle that job
        return Payment::create([
            'id' => $id,
            'amount' => $paymentDTO->amount,
            'type' => $paymentDTO->type,
            'status' => $status,
            'url' => $this->paymentUrl,
        ]);
    }
}
