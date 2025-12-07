<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

// TODO: proper validation for credit card number
class ProcessPaymentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'amount' => ['required', 'integer', 'min:1'],
            'type' => ['required', Rule::in(['fast', 'simple', 'mock'])],
            'creditCard' => ['required', 'string', 'regex:/^\d{13,19}$/'],
            'cvv' => ['required', 'string', 'regex:/^\d{3,4}$/'],
        ];
    }

    public function messages(): array
    {
        return [
            'amount' => __('payment.amount_invalid'),
            'type' => __('payment.type_invalid'),
            'creditCard' => __('payment.card_invalid'),
            'cvv' => __('payment.cvv_invalid'),
        ];
    }

    // TODO: consider using attributes()
}
