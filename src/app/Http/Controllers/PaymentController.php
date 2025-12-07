<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProcessPaymentRequest;
use App\Services\Payment\DTOs\PaymentDTOFactory;
use Illuminate\Http\JsonResponse;

class PaymentController extends Controller
{
    public function __construct(
       private readonly PaymentDTOFactory $paymentDTOFactory
    ) {
    }

    public function process(ProcessPaymentRequest $request): JsonResponse
    {
        $validatedData = $request->validated();
        $paymentDTO = $this->paymentDTOFactory->create($validatedData);

        return new JsonResponse(['success' => true]);
    }
}
