<?php

namespace App\Services;

use App\Mail\SubscriptionMail;
use App\Models\Subscription;
use Illuminate\Support\Facades\Mail;

class SubscriptionService
{
    public function all($id)
    {
        $subscriptions = Subscription::whereId($id)->paginate(request()->input('per_page', 10));
        return $subscriptions;
    }

    public function store(array $data)
    {
        return Subscription::updateOrCreate(['id' =>$data['id']], $data);
    }

    public function create(array $data)
    {
        return Subscription::create($data);
    }

    public function show(string $id)
    {
        $subscription = Subscription::findOrFail($id);
        return $subscription;
    }

    public function destroy(string $id)
    {
        Subscription::whereId($id)->delete();
    }
    public function sendNotificationEmail($user, $subscription)
    {
        $details = [
            'subject' => 'warning',
            'message' => "hi {$user->name} the subscription in magazine {$subscription->magazine->name} is end in {$subscription->end_date}",
        ];
        Mail::to($user->email)->send(new SubscriptionMail($details));
    }


}
