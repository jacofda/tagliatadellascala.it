<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Events\MessageSending;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (config('app.env') !== 'local') {
            URL::forceScheme('https');
        }

    Mail::beforeSending(function (MessageSending $event) {
        \Log::info('MAIL CONFIG:', [
            'host' => config('mail.mailers.smtp.host'),
            'port' => config('mail.mailers.smtp.port'),
            'username' => config('mail.mailers.smtp.username'),
            'password' => substr(config('mail.mailers.smtp.password'), 0, 10) . '...',
            'encryption' => config('mail.mailers.smtp.encryption'),
            'from' => config('mail.from'),
        ]);
    });

    }
}
