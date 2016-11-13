<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Contracts\Validation\Validator;

class UpdateUserProfileRequest extends FormRequest
{
    protected $errorBag = "editProfile";

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
            'forename'          =>  'bail|required|max:50|alpha',
            'surname'           =>  'bail|required|max:50|alpha',
            'current_password'  =>  'required|currentpassword'
        ];
    }

    public function messages() 
    {
        return [
            'forename.required' =>  'Your forename must not be empty.',
            'surname.required' =>  'Your surname must not be empty.',
            'current_password.required' =>  'You need to enter your current password to make any changes to your profile.',
            'current_password.currentpassword' =>  'The current password you entered is incorrect.'
        ];
    }

    public function formatErrors(validator $validator) 
    {
        return $validator->errors()->all();
    }
}
