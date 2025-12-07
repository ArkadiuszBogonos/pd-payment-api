<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProcessPaymentRequest;
use App\Services\Payment\DTOs\PaymentDTOFactory;
use App\Services\Payment\Exceptions\PaymentException;
use App\Services\Payment\PaymentServiceResolver;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

final class PaymentController extends Controller
{
    public function __construct(
        private readonly PaymentServiceResolver $resolver,
        private readonly PaymentDTOFactory $paymentDTOFactory
    ) {
    }

    /**
     * @throws HttpException
     */
    public function process(ProcessPaymentRequest $request): JsonResponse
    {
        $validatedData = $request->validated();
        $paymentDTO = $this->paymentDTOFactory->create($validatedData);

        try {
            $service = $this->resolver->resolve($paymentDTO->type);
            $processedPayment = $service->processPayment($paymentDTO);

            return $processedPayment->toResource()->response()->setStatusCode(Response::HTTP_CREATED);
        } catch (PaymentException $e) {
            Log::warning($e->getMessage(), $e->getTrace());
            throw new HttpException($e->getCode(), $e->getMessage());
        } catch (Throwable $e) {
            Log::error($e->getMessage(), $e->getTrace());
            throw new HttpException(Response::HTTP_BAD_REQUEST, __('payment.payment_failed'));
        }
    }
}
