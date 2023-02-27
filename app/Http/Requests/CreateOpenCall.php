<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOpenCall extends FormRequest
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
            'short_description' => 'required|min:3|max:500',
            'description' => 'required|min:10|max:10000',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'cover_image' => 'image',
            'status' => 'required',
        ];
    }
}
