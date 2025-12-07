<?php

declare(strict_types=1);

namespace App\Models;

use App\Services\Payment\Enums\PaymentStatus;
use App\Services\Payment\Enums\PaymentType;
use Illuminate\Database\Eloquent\Model;

// This is just a mock model
// In real API there would be a lot more going on
// For example relation to Order and User
class Payment extends Model
{
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'amount',
        'type',
        'status',
        'url',
    ];

    protected $casts = [
        'type' => PaymentType::class,
        'status' => PaymentStatus::class,
    ];
}
