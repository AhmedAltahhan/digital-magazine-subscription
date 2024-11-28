<?php

namespace App\Console\Commands;

use App\Models\Subscription;
use App\Services\SubscriptionService;
use Illuminate\Console\Command;
use Illuminate\Console\Scheduling\Schedule;

class CheckSubscriptions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-subscriptions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check subscription expiration and send mail';
    public function __construct(private SubscriptionService $subscriptionService)
    {
        parent::__construct();
    }

    public function schedule(Schedule $schedule): void
    {
        $schedule->call(function() {
            $this->checkSubscriptions();
        })->daily();
    }

    protected function checkSubscriptions(): void
    {
        $subscriptions = Subscription::with('user')->where('end_date', '<=', now()->addDays(7)->where('end_date', '>', now()))->get();
        foreach($subscriptions as $subscription)
        {
            $user = $subscription->user;
            if($user)
            {
                $this->subscriptionService->sendNotificationEmail($user, $subscription);
            }
        }
    }
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->checkSubscriptions();
    }
}
