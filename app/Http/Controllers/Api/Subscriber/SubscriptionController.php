<?php

namespace App\Http\Controllers\Api\Subscriber;

use App\Http\Controllers\Controller;
use App\Http\Requests\Subscription\CreateSubscriptionRequest;
use App\Http\Requests\Subscription\StoreSubscriptionRequest;
use App\Services\SubscriptionService;

class SubscriptionController extends Controller
{
    public function __construct(private SubscriptionService $subscriptionService)
    {
    }

    public function create(CreateSubscriptionRequest $request)
    {
        $user = $this->subscriptionService->create($request->validated());
        return messageSuccessResponse("created completed successfully");
    }
}
