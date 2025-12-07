<?php

declare(strict_types=1);

namespace App\Services\Payment\DTOs;

use App\Services\Payment\Enums\PaymentType;

final readonly class PaymentDTO
{
    public function __construct(
        public int $amount,
        public PaymentType $type,
        public string $creditCardNumber, // TODO: obiekt z walidacją?
        public string $cvvNumber, // TODO: obiekt z walidacją?
    ) {
    }
}
