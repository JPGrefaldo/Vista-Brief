<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePlanningRequest extends FormRequest
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
            'client'        =>  'required',
            'title'         =>  'required|unique:plannings,title',
            'jobstatus'     =>  'required',
        ];
    }

    public function messages() 
    {
        return [
            'client.required'       =>  'You need to select a Client',
            'title.required'        =>  'The Job Title is required.',
            'title.unique'          =>  'The Job Title is already taken.',
            'jobstatus.required'    =>  'You need to select the Job Status.',
        ];
    }
}
