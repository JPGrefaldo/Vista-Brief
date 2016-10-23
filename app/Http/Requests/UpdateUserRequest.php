<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username'      =>  'bail|required|unique:users,username,'.$this->user_id,
            'forename'      =>  'bail|required|max:50|alpha',
            'surname'       =>  'bail|required|max:50|alpha',
            'email'         =>  'bail|required|email|unique:users,email,'.$this->user_id,
            'password'      =>  'bail|min:4|confirmed|alpha_num',
            'password_admin'    =>  'bail|required|isadmin|adminpass'
        ];
    }

    public function messages() 
    {
        return [
            'username.required'     =>  'Username is required.',
            'username.unique'       =>  'Username is already taken.',
            'forename.required'     =>  'Forename is requried.',
            'surname.required'      =>  'Surname is required.',
            'email.required'        =>  'Email is required.',
            'email.unique'          =>  'Email is already taken.',
            'password_admin.required'   =>  'You need to enter the correct Admin password',
            'password_admin.adminpass'  =>  'You need to enter the correct Admin password',
        ];
    }
}
