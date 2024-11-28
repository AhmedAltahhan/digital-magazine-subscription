<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Magazine extends Model
{
    /** @use HasFactory<\Database\Factories\MagazineFactory> */
    use HasFactory, LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->LogOnly(['name','description'])->useLogName('subscription')->setDescriptionForEvent(fn(string $eventName) => "Magazine has been {$eventName}");
    }

    protected $fillable = [
        'name',
        'description',
        'release_date',
    ];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
