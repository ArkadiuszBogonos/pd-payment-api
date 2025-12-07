<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class PaymentController extends Controller
{
    public function process(): JsonResponse
    {
        return new JsonResponse(['success' => true]);
    }
}
