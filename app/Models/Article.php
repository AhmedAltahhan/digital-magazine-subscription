<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Article extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleFactory> */
    use HasFactory, LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->LogOnly(['title','content'])->useLogName('article')->setDescriptionForEvent(fn(string $eventName) => "Article has been {$eventName}");
    }

    protected $fillable = [
        'title',
        'content',
        'magazine_id',
        'publication_date',
    ];

    public function magazine()
    {
        return $this->belongsTo(Magazine::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
