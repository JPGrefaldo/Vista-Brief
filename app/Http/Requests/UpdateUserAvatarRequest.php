<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserAvatarRequest extends FormRequest
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
            'avatar'      =>  'bail|required|image|max:5120'
        ];
    }

    public function messages() 
    {
        return [
            'avatar.required'   =>  'You need to select a photo.',
            'avatar.image'      =>  'The photo must be an image.',
            'avatar.max'        =>  'The photo cannot exceed the size of 5MB.',
        ];
    }
}
