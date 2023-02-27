<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOpenCallForm extends FormRequest
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
            'field_label' => 'required|min:3|max:20',
            'field_type' => 'required',
            'field_name' => 'required|min:3|max:20',
            'field_description' => 'min:10|max:70',
            'status' => 'required',
        ];
    }
}
