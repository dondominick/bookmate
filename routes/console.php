<?php

use App\Console\Commands\CheckOverdueBooks;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('app:check-overdue-books', CheckOverdueBooks::class)->purpose('Check if a borrowed book is overdue and updates the database')->daily();
