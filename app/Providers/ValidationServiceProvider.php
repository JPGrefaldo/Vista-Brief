<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
//use App\Extensions\Validations\CustomValidation;
//use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Hash;

class ValidationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('adminpass', 'App\Extensions\Validations\CustomValidation@validate_adminpass');

        Validator::extend('isadmin', 'App\Extensions\Validations\CustomValidation@validate_isadmin');

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
