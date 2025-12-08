<?php

declare(strict_types=1);

namespace Tests\Unit\Services\Payment\Strategies;

use App\Services\Payment\DTOs\CreditCardDTO;
use App\Services\Payment\DTOs\PaymentDTO;
use App\Services\Payment\Enums\PaymentType;
use App\Services\Payment\Exceptions\PaymentException;
use App\Services\Payment\Strategies\MockPayment;
use Tests\TestCase;

final class MockPaymentTest extends TestCase
{
    public function test_process_payment_throws_exception(): void
    {
        $creditCard = new CreditCardDTO(
            number: '4111111111111111',
            cvv: '123'
        );

        $paymentDTO = new PaymentDTO(
            amount: 1000,
            type: PaymentType::MOCK,
            creditCard: $creditCard
        );

        $paymentService = new MockPayment();

        $this->expectException(PaymentException::class);

        $paymentService->processPayment($paymentDTO);
    }
}
