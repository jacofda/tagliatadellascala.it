<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Swift_SmtpTransport;

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


$this->app->make('mail.manager')->extend('smtp', function ($config) {
            $swift_transport = new \Swift_SmtpTransport(
                env('MAIL_HOST'), 
                env('MAIL_PORT'), 
                env('MAIL_ENCRYPTION')
            );
            $swift_transport->setUsername(env('MAIL_USERNAME'));
            $swift_transport->setPassword(env('MAIL_PASSWORD'));
            $swift_transport->setStreamOptions([
                'ssl' => [
                    'allow_self_signed' => true,
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                ],
            ]);
            return new \Illuminate\Mail\Transport\SwiftTransport($swift_transport);
        });

        }
    }
}
