<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Validator::extend('checkbackslash', function ($attribute, $value, $parameters, $validator) {
            if (!empty($value))
            {
                $str = strpos($value,'/',0);
                if($str == false)
                {
                    return true;
                }
                else
                    return false;
            }
            else
                return false;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
