<?php

declare(strict_types=1);

namespace App\Services\Payment;

use App\Services\Payment\Enums\PaymentType;
use App\Services\Payment\Strategies\FastPayment;
use App\Services\Payment\Strategies\MockPayment;
use App\Services\Payment\Strategies\SimplePayment;
use Illuminate\Contracts\Container\BindingResolutionException;
use InvalidArgumentException;
use Illuminate\Contracts\Container\Container;

readonly class PaymentServiceResolver
{
    protected array $map;

    public function __construct(
        protected Container $container
    ) {
        $this->map = [
            'fast' => FastPayment::class,
            'simple' => SimplePayment::class,
            'mock' => MockPayment::class,
        ];
    }

    /**
     * @throws BindingResolutionException
     */
    public function resolve(PaymentType $type): PaymentServiceInterface
    {
        if (!isset($this->map[$type->value])) {
            throw new InvalidArgumentException("Unknown payment type: {$type->value}");
        }

        return $this->container->make($this->map[$type->value]);
    }
}
