<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
//use App\Extensions\Validations\CustomValidator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ValidationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /*$this->app->validator->resolver(function($translator, $data, $rules, $messages) {
            return new CustomValidator($translator, $data, $rules, $messages);
        });*/

        Validator::extend('adminpassword_check', function($attribute, $value, $parameters, $validator){
            if (Hash::check($value, Auth::user()->getAuthPassword())) {
                return true;
            }
            return false;
        });

        Validator::extend('is_admin', function($attribute, $value, $parameters, $validator){
            if (Auth::user()->type == 1) {
                return true;
            }
            return false;
        });
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
