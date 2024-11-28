<?php

use App\Console\Commands\CheckSubscriptions;
use App\Console\Commands\SendSubscriptionReport;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::command(CheckSubscriptions::class)->daily();
Schedule::command(SendSubscriptionReport::class)->daily();
