<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Contracts\Validation\Validator;

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
            'formatofresponse'  =>  'required',
            'pitch_quote_date'      =>  'required_without_all:ideal_qa_date,ideal_review_date,project_deadline_date',
            'ideal_qa_date'      =>  'required_without_all:pitch_quote_date,ideal_review_date,project_deadline_date',
            'ideal_review_date'      =>  'required_without_all:pitch_quote_date,ideal_qa_date,project_deadline_date',
            'project_deadline_date'      =>  'required_without_all:pitch_quote_date,ideal_qa_date,ideal_review_date',
        ];
    }

    public function messages() 
    {
        return [
            'client.required'       =>  'You need to select a Client',
            'title.required'        =>  'The Job Title is required.',
            'title.unique'          =>  'The Job Title is already taken.',
            'jobstatus.required'    =>  'You need to select the Job Status.',
            'formatofresponse.required'    =>  'You need to select the Format of Response.',
            'pitch_quote_date.required_without_all'  =>  'You need to choose at least one of the required Timings.',
            'ideal_qa_date.required_without_all'  =>  'You need to choose at least one of the required Timings.',
            'ideal_review_date.required_without_all'  =>  'You need to choose at least one of the required Timings.',
            'project_deadline_date.required_without_all'  =>  'You need to choose at least one of the required Timings.',
        ];
    }

    public function formatErrors(validator $validator) 
    {
       return $validator->errors()->unique();
    }
}
