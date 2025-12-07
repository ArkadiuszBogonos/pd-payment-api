<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProcessPaymentRequest;
use Illuminate\Http\JsonResponse;

class PaymentController extends Controller
{
    public function process(ProcessPaymentRequest $request): JsonResponse
    {
        return new JsonResponse(['success' => true]);
    }
}
