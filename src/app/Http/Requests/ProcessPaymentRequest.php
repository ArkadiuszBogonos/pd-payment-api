<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Services\Payment\Enums\PaymentType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

// In real case scenario I would implement Luhn algorithm for more robust CC number check
final class ProcessPaymentRequest extends FormRequest
{
    private array $availablePaymentTypes;

    public function __construct()
    {
        parent::__construct();

        $this->availablePaymentTypes = array_map(fn($case) => $case->value, PaymentType::cases());
    }

    public function rules(): array
    {
        return [
            'amount' => ['required', 'integer', 'min:1'],
            'type' => ['required', Rule::in($this->availablePaymentTypes)],
            'creditCard' => ['required', 'string', 'between:13,19'],
            'cvv' => ['required', 'string', 'between:3,4'],
        ];
    }

    public function messages(): array
    {
        return [
            'amount.required' => __('payment.amount_required'),
            'amount.integer' => __('payment.amount_integer'),
            'amount.min' => __('payment.amount_min'),

            'type.required' => __('payment.type_required'),
            'type.in' => __('payment.type_invalid', ['available_types' => implode(' / ', $this->availablePaymentTypes)]),

            'creditCard.required' => __('payment.card_required'),
            'creditCard.between' => __('payment.card_between'),

            'cvv.required' => __('payment.cvv_required'),
            'cvv.between' => __('payment.cvv_between'),
        ];
    }
}
