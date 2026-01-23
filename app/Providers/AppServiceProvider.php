<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mailer\Transport\Smtp\EsmtpTransport;
use Symfony\Component\Mailer\Transport\Smtp\Stream\SocketStream;

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

        Mail::extend('custom_smtp', function ($config) {
            $streamOptions = [
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true,
                ],
            ];
            
            $transport = new EsmtpTransport(
                $config['host'],
                $config['port'],
                $config['encryption'] ?? false
            );
            
            $transport->setStreamOptions($streamOptions);
            
            if (isset($config['username'])) {
                $transport->setUsername($config['username']);
                $transport->setPassword($config['password']);
            }
            
            return $transport;
        });

    }
}
