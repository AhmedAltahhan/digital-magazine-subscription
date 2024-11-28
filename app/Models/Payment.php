<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Payment extends Model
{
    /** @use HasFactory<\Database\Factories\PaymentFactory> */
    use HasFactory, LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->LogOnly(['user_id','payment_method','amount_paid'])->useLogName('payment')->setDescriptionForEvent(fn(string $eventName) => "Payment has been {$eventName}");
    }


    protected $fillable = [
        'user_id',
        'subscription_id',
        'amount_paid',
        'payment_method',
        'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }
}
