<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
    if ($this->method() == 'post'){
        return [
            'title' => 'required|max:255',
            'description' => 'required',
            'body' => 'required',
            'images' => 'required|mimes:jpeg,pmp,png',
            'tags' => 'nullable',
        ];
    }
        return [
            'title' => 'required|max:255',
            'description' => 'required',
            'body' => 'required',
            'tags' => 'nullable',
//            'categories' => 'required',
        ];

    }
}
