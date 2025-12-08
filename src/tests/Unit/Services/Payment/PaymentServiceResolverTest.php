<?php

declare(strict_types=1);

namespace Unit\Services\Payment;

use App\Services\Payment\Enums\PaymentType;
use App\Services\Payment\PaymentServiceResolver;
use App\Services\Payment\Strategies\FastPayment;
use App\Services\Payment\Strategies\MockPayment;
use App\Services\Payment\Strategies\SimplePayment;
use Illuminate\Contracts\Container\Container;
use Tests\TestCase;

class PaymentServiceResolverTest extends TestCase
{
    private Container $container;
    private PaymentServiceResolver $resolver;

    protected function setUp(): void
    {
        parent::setUp();

        $this->container = $this->createMock(Container::class);
        $this->resolver = new PaymentServiceResolver($this->container);
    }

    public function test_resolves_fast_payment(): void
    {
        $this->container
            ->expects($this->once())
            ->method('make')
            ->with(FastPayment::class)
            ->willReturn(new FastPayment());

        $service = $this->resolver->resolve(PaymentType::FAST);

        $this->assertInstanceOf(FastPayment::class, $service);
    }

    public function test_resolves_simple_payment(): void
    {
        $this->container
            ->expects($this->once())
            ->method('make')
            ->with(SimplePayment::class)
            ->willReturn(new SimplePayment());

        $service = $this->resolver->resolve(PaymentType::SIMPLE);

        $this->assertInstanceOf(SimplePayment::class, $service);
    }

    public function test_resolves_mock_payment(): void
    {

        $this->container
            ->expects($this->once())
            ->method('make')
            ->with(MockPayment::class)
            ->willReturn(new MockPayment());

        $service = $this->resolver->resolve(PaymentType::MOCK);

        $this->assertInstanceOf(MockPayment::class, $service);
    }

}
