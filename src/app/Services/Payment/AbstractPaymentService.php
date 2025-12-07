<?php

namespace App\Services\Payment;

use Carbon\Carbon;

readonly abstract class AbstractPaymentService implements PaymentServiceInterface
{
    public function __construct(
        protected ?string $paymentUrl = null
    ) {
    }

    protected function baseResponse(string $id, string $status): array
    {
        return [
            'id' => $id,
            'status' => $status,
            'paymentUrl' => $this->paymentUrl,
            'datetime' => Carbon::now()->toString(),
        ];
    }
}
