<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

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
        Validator::extend('at_least_one_checked', function ($attribute, $value, $parameters, $validator) {
            $input = $validator->getData();
            foreach ($input as $key => $val) {
                if (strpos($key, $parameters[0]) === 0 && $val === 'on') {
                    return true;
                }
            }
            return false;
        });
    }
}
