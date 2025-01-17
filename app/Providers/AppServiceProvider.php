<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;


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
        // Enforce https redirect
        if (env('APP_ENV') !== 'local') {
            URL::forceScheme('https');
        }

        // Custom validator for reCAPTCHA
        Validator::extend('recaptcha', function ($attribute, $value, $parameters, $validator) {
            $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => env('RECAPTCHA_SECRET_KEY'),
                'response' => $value,
                'remoteip' => request()->ip()
            ]);

            return $response->json()['success'] ?? false;
        }, 'The reCAPTCHA verification failed. Please try again.');
        // END
    }
}
