<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
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
            'name'  =>  'required|max:100|unique:clients,name,'.$this->id,
        ];
    }

    public function messages() 
    {
        return [
            'name.required' =>  'Client name cannot be empty.',
            'name.max'      =>  'Client name may not be greater than 100 characters.',
            'name.unique'   =>  'Client name is already taken..',
        ];
    }
}
