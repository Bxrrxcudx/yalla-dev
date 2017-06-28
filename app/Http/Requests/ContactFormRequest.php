<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
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
            'last_name' => 'required|string|max:30',
            'first_name' => 'required|string|max:20',
            'mail' => 'required|string',
            'subject' => 'required|string|max:100',
            'message' => 'required|string|max:400'
        ];
    }
}
