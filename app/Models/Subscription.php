<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Subscription extends Model
{
    /** @use HasFactory<\Database\Factories\SubscriptionFactory> */
    use HasFactory, LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->LogOnly(['user_id','magazine_id','end_date','status'])->useLogName('subscription')->setDescriptionForEvent(fn(string $eventName) => "Subscription has been {$eventName}");
    }

    protected $fillable = [
        'user_id',
        'magazine_id',
        'start_date',
        'end_date',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function magazine()
    {
        return $this->belongsTo(Magazine::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }


}
