<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateShopItems extends FormRequest
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
            'item_title' => 'required|min:3|max:50',
            'item_short_description' => 'min:10|max:50',
            'item_description' => 'required|min:10|max:100',
            'item_filename' => 'required|mimes:jpg,png,jpeg,gif',
            'item_price' => 'required|int',
            'status' => 'required',
        ];

        if($this->method() != 'POST') {
            $rules['item_filename'] = 'mimes:jpg,png,jpeg,gif';
        }

        return $rules;
    }
}
