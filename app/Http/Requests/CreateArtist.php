<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateArtist extends FormRequest
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
            'artist_name' => 'required|min:3|max:50',
            'artist_title' => 'required|min:3|max:50',
            'artist_location' => 'required|min:3|max:50',
            'artist_description' => 'required|min:10|max:10000',
            'cover_image' => 'required|mimes:jpg,png,jpeg,gif',
            'artist_video_url' => 'min:5|max:5000',
            'status' => 'required',
        ];

        if($this->method() != 'POST') {
            $rules['cover_image'] = 'mimes:jpg,png,jpeg,gif';
        }

        return $rules;
    }
}
