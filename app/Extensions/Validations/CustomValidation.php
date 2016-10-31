<?php 

namespace App\Extensions\Validations;

//user Illuminate\Validation\Validator;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomValidation
{
	
	public function validate_adminpass($attribute, $value, $parameters, $validator) {
        if (Hash::check($value, Auth::user()->getAuthPassword())) {
            return true;
        }
        return false;
	}

	public function validate_isadmin($attribute, $value, $parameters, $validator) {
        if (Auth::user()->type == 1) {
            return true;
        }
        return false;
	}

    public function validate_currentpassword($attribute, $value, $parameters, $validator) {
        if (Hash::check($value, Auth::user()->getAuthPassword())) {
            return true;
        }
        return false;
    }
}