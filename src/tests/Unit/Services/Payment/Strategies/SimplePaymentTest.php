<?php

declare(strict_types=1);

namespace Tests\Unit\Services\Payment\Strategies;

use App\Models\Payment;
use App\Services\Payment\DTOs\CreditCardDTO;
use App\Services\Payment\DTOs\PaymentDTO;
use App\Services\Payment\Enums\PaymentStatus;
use App\Services\Payment\Enums\PaymentType;
use App\Services\Payment\Strategies\SimplePayment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class SimplePaymentTest extends TestCase
{
    use RefreshDatabase;

    public function test_process_payment_creates_payment(): void
    {
        $creditCard = new CreditCardDTO(
            number: '4111111111111111',
            cvv: '123',
        );

        $paymentDTO = new PaymentDTO(
            amount: 1000,
            type: PaymentType::SIMPLE,
            creditCard: $creditCard,
        );

        $paymentService = new SimplePayment('www.example.test');

        $payment = $paymentService->processPayment($paymentDTO);

        $this->assertInstanceOf(Payment::class, $payment);
        $this->assertEquals(PaymentStatus::PENDING, $payment->status);
        $this->assertEquals($paymentDTO->amount, $payment->amount);
        $this->assertEquals($paymentDTO->type, $payment->type);
        $this->assertDatabaseHas('payments', [
            'id' => $payment->id,
            'amount' => $paymentDTO->amount,
            'type' => $paymentDTO->type->value,
            'status' => PaymentStatus::PENDING->value,
        ]);
    }
}
