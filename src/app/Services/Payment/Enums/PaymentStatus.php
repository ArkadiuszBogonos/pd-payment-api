<?php

declare(strict_types=1);

namespace App\Services\Payment\Enums;

enum PaymentStatus: string
{
    case CANCELLED = 'cancelled';
    case FAILED = 'failed';
    case PENDING = 'pending';
    case SUCCESS = 'success';

}
