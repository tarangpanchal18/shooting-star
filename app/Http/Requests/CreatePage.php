<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePage extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|min:3|max:50',
            'description' => 'required|min:10|max:5000',
            'seo_description' => 'required|min:3|max:1000',
            'seo_keywords' => 'required|min:3|max:500',
            'page_image' => 'image',
            'status' => 'required',
        ];
    }
}
