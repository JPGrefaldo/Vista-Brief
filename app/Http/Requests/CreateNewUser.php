<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateNewUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return Auth::check ? true : false;
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username'  =>  'required|unique:users',
            'forename'  =>  'required|max:50',
            'surname'   =>  'required|max:50',
            'email'     =>  'required|email|unique:users',
            'password'  =>  'required|min:4|confirmed',
            'password_admin'    =>  'required'
        ];
    }
}
