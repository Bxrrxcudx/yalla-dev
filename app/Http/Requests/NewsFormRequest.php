<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsFormRequest extends FormRequest
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
            'title' => 'required|string|between:1,140',
            'authors' => 'required|string|max:30',
            'content' => 'required',
            'category_id' => 'required',
            'tags_list[]' => 'nullable'
        ];
    }
}
