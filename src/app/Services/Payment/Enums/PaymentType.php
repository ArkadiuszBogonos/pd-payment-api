<?php

declare(strict_types=1);

namespace App\Services\Payment\Enums;

enum PaymentType: string
{
    case FAST = 'fast';
    case SIMPLE = 'simple';
    case MOCK = 'mock';
}
