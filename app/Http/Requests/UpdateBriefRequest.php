<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBriefRequest extends FormRequest
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
            'projectstatus' =>  'required',
            'jobnumber'     =>  'required|unique:briefs,jobnumber,'.$this->brief_id,
            'jobname'       =>  'required|unique:briefs,jobname,'.$this->brief_id,
        ];
    }

    public function messages() 
    {
        return [
            'client.required'           =>  'Client is required.',
            'projectstatus.required'    =>  'Project Status is requried.',
            'jobnumber.required'        =>  'Job Number is required.',
            'jobname.required'          =>  'Job Name is required.',
            'jobname.unique'            =>  'That Job Name is already taken.',
        ];
    }
}
