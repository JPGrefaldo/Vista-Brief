<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Contracts\Validation\Validator;

class StoreDepartmentRequest extends FormRequest
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
            'name'        =>  'bail|required|unique:departments,name',
            'email.*'     =>  'bail|email',
            'attachment'  =>  'bail|max:5120',
        ];
    }

    public function messages() 
    {
        return [
            'name.required' =>  'Name must not be empty.',
            'name.unique'   =>  'Name is already taken.',
            'email.*.email' =>  'One or more of the email(s) is not a valid email address.',
            'attachment.max'    =>  'Attached file must not exceed 5MB of size.',
        ];
    }
    
    public function formatErrors(validator $validator) 
    {
        return $validator->errors()->unique();
    }
}
