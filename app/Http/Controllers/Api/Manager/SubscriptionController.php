<?php

namespace App\Http\Controllers\Api\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\Subscription\StoreSubscriptionRequest;
use App\Http\Resources\SubscriptionResource;
use App\Models\Subscription;
use App\Services\SubscriptionService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function __construct(private SubscriptionService $subscriptionService)
    {
    }

    public function index()
    {
        $id = Auth::user()->id;
        $subscriptions = $this->subscriptionService->all($id);
        $data = SubscriptionResource::collection($subscriptions);
        return paginateSuccessResponse($data, "subscriptions found successfuly");
    }

    public function store(StoreSubscriptionRequest $request)
    {
        $user = $this->subscriptionService->store($request->validated());
        return messageSuccessResponse("created completed successfully");
    }

    public function show(string $id)
    {
        $subscription = $this->subscriptionService->show($id);
        $data = SubscriptionResource::make($subscription);
        return successResponse($data, "subscription found successfuly");
    }

    public function destroy(string $id)
    {
        $this->subscriptionService->destroy($id);
        return messageSuccessResponse("the operation was completed successfully");
    }

    public function checkSubscriptions()
    {
        $subscriptions = Subscription::where('end_date', '<=', now()->addDays(7)->where('end_date', '>', now()))->get();
        foreach($subscriptions as $subscription)
        {
            $user = $subscription->user;
            if($user)
            {
                $this->subscriptionService->sendNotificationEmail($user, $subscription);
            }
        }
    }

}
