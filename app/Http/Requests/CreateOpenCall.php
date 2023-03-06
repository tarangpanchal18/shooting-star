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
        $rules =  [
            'title' => 'required|min:3|max:50',
            'short_description' => 'required|min:3|max:500',
            'description' => 'required|min:10|max:10000',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'cover_image' => 'required|mimes:jpg,png,jpeg,gif',
            'status' => 'required',
        ];

        if ($this->routeIs('admin.opencall.update')) {
            $rules['cover_image'] = 'mimes:jpg,png,jpeg,gif';
        }

        return $rules;
    }
}
