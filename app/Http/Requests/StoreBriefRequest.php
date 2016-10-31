<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'jobnumber'     =>  'required',
            'jobname'       =>  'required|unique:briefs,jobname',
            'quotereq'      =>  'required_without_all:proposedreq,stagereq,projdelivered',
            'proposedreq'      =>  'required_without_all:quotereq,stagereq,projdelivered',
            'stagereq'      =>  'required_without_all:quotereq,proposedreq,projdelivered',
            'projdelivered'      =>  'required_without_all:quotereq,proposedreq,stagereq',
        ];
    }

    public function messages() 
    {
        return [
            'client.required'           =>  'Client is required.',
            'projectstatus.required'    =>  'Project Status is required.',
            'jobnumber.required'        =>  'Job Number is required.',
            'jobname.required'          =>  'Job Name is required.',
            'jobname.unique'            =>  'That Job Name is already taken.',
            'quotereq.required_without_all'  =>  'You need to choose at least one of the required dates.',
            'proposedreq.required_without_all'  =>  'You need to choose at least one of the required dates.',
            'stagereq.required_without_all'  =>  'You need to choose at least one of the required dates.',
            'projdelivered.required_without_all'  =>  'You need to choose at least one of the required dates.',
        ];
    }
}
