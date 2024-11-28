<?php

namespace App\Console\Commands;

use App\Mail\SubscriptionReportMail;
use App\Models\Payment;
use App\Models\Subscription;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendSubscriptionReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-subscription-report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send report of active subscriptions and payment to manager';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $active_subscriptions = Subscription::where('status','active')->get();
        $payments = Payment::get();
        Mail::to('manager@gmail.com')->send(new SubscriptionReportMail($active_subscriptions,$payments));
    }
}
