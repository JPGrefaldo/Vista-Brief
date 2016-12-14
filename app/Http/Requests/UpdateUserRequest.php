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
            'username'      =>  'bail|required|max:200|unique:users,username,'.$this->user_id,
            'forename'      =>  'bail|required|max:50|alpha',
            'surname'       =>  'bail|required|max:50|alpha',
            'email'         =>  'bail|required|max:200|email|unique:users,email,'.$this->user_id,
            'password'      =>  'bail|min:4|max:255|confirmed|alpha_num',
            'password_admin'=>  'bail|required|max:255|isadmin|adminpass'
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
            'password.confirmed'    =>  'The password you entered don\'t match.',
            'password_admin.required'   =>  'You need to enter your correct Admin password.',
            'password_admin.adminpass'  =>  'You need to enter your correct Admin password.',
        ];
    }

    protected function validationData()
    {
        $input = array_map('trim', $this->all());
        $input['email'] =  $input['email'].'@wearevista.co.uk';
        $this->replace($input);
        // dd($this->all()); exit();
        return $this->all();
    }

    public function response(array $errors)
    {
        if ($this->expectsJson()) {
            return new JsonResponse($errors, 422);
        }

        $input = array_map('trim', $this->all());
        $email_parts = explode('@', $input['email']);
        $input['email'] =  $email_parts[0];
        $this->replace($input);

        return $this->redirector->to($this->getRedirectUrl())
                                        ->withInput($this->except($this->dontFlash))
                                        ->withErrors($errors, $this->errorBag);
    }
}
