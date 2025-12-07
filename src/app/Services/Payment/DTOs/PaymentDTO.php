<?php

declare(strict_types=1);

namespace App\Services\Payment\DTOs;

use App\Services\Payment\Enums\PaymentType;

final readonly class PaymentDTO
{
    public function __construct(
        public int $amount,
        public PaymentType $type,
        public CreditCardDTO $creditCard,
    ) {
    }
}
