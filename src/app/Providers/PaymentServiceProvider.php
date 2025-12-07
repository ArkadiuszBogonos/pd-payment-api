<?php

declare(strict_types=1);

namespace App\Providers;

use App\Services\Payment\PaymentServiceResolver;
use App\Services\Payment\Strategies\FastPayment;
use App\Services\Payment\Strategies\MockPayment;
use App\Services\Payment\Strategies\SimplePayment;
use Illuminate\Support\ServiceProvider;

class PaymentServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(FastPayment::class, function () {
            return new FastPayment(config('payments.urls.fast'));
        });

        $this->app->singleton(SimplePayment::class, function () {
            return new SimplePayment(config('payments.urls.simple'));
        });

        $this->app->singleton(MockPayment::class, function () {
            return new MockPayment();
        });

        $this->app->singleton(PaymentServiceResolver::class, function($app) {
            return new PaymentServiceResolver($app);
        });
    }
}
