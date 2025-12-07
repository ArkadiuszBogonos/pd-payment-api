<?php

declare(strict_types=1);

namespace App\Services\Payment\DTOs;

final readonly class CreditCardDTO
{
    public function __construct(
        public string $number,
        public string $cvv,
    ) {
    }
}
