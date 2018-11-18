<?php

namespace App\Providers;

use App\Payments\PaymentCodeGenerator;
use Illuminate\Support\ServiceProvider;
use App\Payments\UniquePaymentCodeGenerator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PaymentCodeGenerator::class, UniquePaymentCodeGenerator::class);
    }
}
