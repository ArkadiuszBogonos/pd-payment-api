<?php

declare(strict_types=1);

namespace App\Services\Payment\Strategies;

use App\Models\Payment;
use App\Services\Payment\AbstractPaymentService;
use App\Services\Payment\DTOs\PaymentDTO;
use App\Services\Payment\Enums\PaymentStatus;
use Illuminate\Support\Str;

final readonly class SimplePayment extends AbstractPaymentService
{
    public function processPayment(PaymentDTO $paymentDTO): Payment
    {
        // Just a mock...
        // Usually you would call a 3rd party payment system here
        $id = Str::uuid()->toString();
        $status = PaymentStatus::PENDING;

        return $this->storePayment($id, $status, $paymentDTO);
    }
}
