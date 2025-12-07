<?php

namespace App\Services\Payment\DTOs;

use App\Services\Payment\Enums\PaymentType;
use JetBrains\PhpStorm\ArrayShape;

final readonly class PaymentDTOFactory
{
    public static function create(
        #[ArrayShape([
            'amount' => 'int',
            'type' => 'string',
            'creditCard' => 'string',
            'cvv' => 'int'
        ])]
        array $validatedRequest
    ): PaymentDTO
    {
        return new PaymentDTO(
            $validatedRequest['amount'],
            PaymentType::from($validatedRequest['type']),
            $validatedRequest['creditCard'],
            $validatedRequest['cvv'],
        );
    }
}
