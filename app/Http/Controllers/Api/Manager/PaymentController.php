<?php

namespace App\Http\Controllers\Api\Manager;

use App\Http\Controllers\Controller;
use App\Http\Resources\PaymentResource;
use App\Services\PaymentService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function __construct(private PaymentService $paymentService)
    {
    }

    public function index()
    {
        $payment = $this->paymentService->all();
        $data = PaymentResource::collection($payment);
        return paginateSuccessResponse($data, "payments found successfuly");
    }
}
