<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Contracts\Validation\Validator;

class StoreBriefRequest extends FormRequest
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
            'jobnumber'     =>  'required:max:6',
            'oldjobnumber'  =>  'max:6',
            'jobname'       =>  'required|unique:briefs,jobname',
            'quotereq'      =>  'required',
            'proposedreq'   =>  'required',
            'stagereq'      =>  'required',
            'projdelivered' =>  'required',
            'department'    =>  'required',
            'attachments.*' =>  'max:5120',
        ];

        // $count_attachments = count($this->input('attachments')) - 1;
        // foreach(range(0, $count_attachments) as $index) {
        //     $rules['attachments.'.$index] = 'max:5120';
        // }
        // return $rules;
    }

    public function messages() 
    {
        return [
            'client.required'           =>  'Client is required.',
            'projectstatus.required'    =>  'Project Status is required.',
            'jobnumber.required'        =>  'Job Number is required.',
            'jobname.required'          =>  'Job Name is required.',
            'jobname.unique'            =>  'That Job Name is already taken.',
            'quotereq.required'         =>  'Quote Required by is required.',
            'proposedreq.required'      =>  'Proposed Required by is required.',
            'stagereq.required'         =>  '1st Stage Required by is required.',
            'projdelivered.required'    =>  'Projects Delivered by is required.',
            'department.required'       =>  'You need to select at least one discipline.',
            'attachments.*'             =>  'Each attached file must not exceed 5MB of size.',
        ];
    }

    public function formatErrors(validator $validator) 
    {
        return $validator->errors()->unique();
    }
}




            // 'quotereq'      =>  'required_without_all:proposedreq,stagereq,projdelivered',
            // 'proposedreq'   =>  'required_without_all:quotereq,stagereq,projdelivered',
            // 'stagereq'      =>  'required_without_all:quotereq,proposedreq,projdelivered',
            // 'projdelivered' =>  'required_without_all:quotereq,proposedreq,stagereq',

            // 'quotereq.required_without_all'  =>  'You need to choose at least one of the required dates.',
            // 'proposedreq.required_without_all'  =>  'You need to choose at least one of the required dates.',
            // 'stagereq.required_without_all'  =>  'You need to choose at least one of the required dates.',
            // 'projdelivered.required_without_all'  =>  'You need to choose at least one of the required dates.',