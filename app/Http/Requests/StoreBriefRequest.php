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
<<<<<<< HEAD
            'client'            =>  'required',
            'projectstatus'     =>  'required',
            'jobnumber'         =>  'required|max:6',
            'oldjobnumber'      =>  'max:6',
            'budget'            =>  'required|max:50',
            'pmanager'          =>  'required',
            'jobname'           =>  'required|max:75|unique:briefs,jobname',
            'keydeliverables'   =>  'required|max:75',
            'quotereq'          =>  'required',
            'proposedreq'       =>  'required',
            'stagereq'          =>  'required',
            'projdelivered'     =>  'required',
            'summary'           =>  'required|max:200',
            'department'        =>  'required',
            'objmeasure'        =>  'required',
            'budget_timings_outputs_req'    =>  'required',
            'attachments.*'     =>  'max:5120',
=======
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
>>>>>>> 563a89409c1c675e3b886a5d709842d213b1618c
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
            'oldjobnumber.max'          =>  'Old Job Number may not be greater than 6 characters.',
            'budget.required'           =>  'Budget is required.',
            'budget.max'                =>  'Budget may not be greater than 50 characters.',
            'pmanager.required'         =>  'Project Manager is required.',
            'jobname.required'          =>  'Job Name is required.',
<<<<<<< HEAD
            'jobname.max'               =>  'Job Name may not be greater than 75 characters.',
            'jobname.unique'            =>  'Job Name is already taken.',
            'keydeliverables.required'  =>  'Key Deliverables is required.',
            'keydeliverables.max'       =>  'Key Deliverables may not be greater than 75 characters.',
=======
            'jobname.unique'            =>  'That Job Name is already taken.',
>>>>>>> 563a89409c1c675e3b886a5d709842d213b1618c
            'quotereq.required'         =>  'Quote Required by is required.',
            'proposedreq.required'      =>  'Proposed Required by is required.',
            'stagereq.required'         =>  '1st Stage Required by is required.',
            'projdelivered.required'    =>  'Projects Delivered by is required.',
<<<<<<< HEAD
            'summary.required'          =>  'Summary is required.',
            'summary.max'               =>  'Summary may not be greater than 200 characters.',
            'department.required'       =>  'You need to select at least one discipline.',
            'objmeasure.required'       =>  'Objectives / Measure is required.',
            'budget_timings_outputs_req.required'   =>  'Budget, Timings and Outputs Required is required.',
=======
            'department.required'       =>  'You need to select at least one discipline.',
>>>>>>> 563a89409c1c675e3b886a5d709842d213b1618c
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