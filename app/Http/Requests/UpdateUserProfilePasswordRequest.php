<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserProfilePasswordRequest extends FormRequest
{
    protected $errorBag = "changePassword";

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
            'password'  =>  'bail|required|min:4|max:255|confirmed|alpha_num',
            'current_password'  =>  'bail|required|currentpassword'
        ];
    }

    public function messages() 
    {
        return [
            'password.required' =>  'Your new password must not be empty.',
            'password.confirmed' =>  'Your new password did not match.',
            'current_password.required' =>  'You need to enter your current password to make any changes to your profile.',
            'current_password.currentpassword' =>  'The current password you entered is incorrect.',
        ];
    }
}
