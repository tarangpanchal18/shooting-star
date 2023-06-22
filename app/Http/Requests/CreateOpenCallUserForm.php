<?php

namespace App\Http\Requests;

use App\Models\OpenCall;
use Illuminate\Foundation\Http\FormRequest;

class CreateOpenCallUserForm extends FormRequest
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
        $rules = [
            'open_call_id' => 'required|integer',
            'name' => 'required|min:3|max:50',
            'email' => 'required|email:rfc',
            'phone' => 'required|min_digits:9|max_digits:15',
            'website_link' => 'required|min:3|max:500',
            'instagram_link' => 'required|url',
            'comment' => '',
            'art_work_title.*' => 'nullable|min:3|max:50',
            'art_work_size.*' => 'nullable|min:3|max:50',
            'art_work_medium.*' => 'nullable|min:3|max:50',
            'art_work_image.*' => 'nullable|mimes:jpg,png,jpeg,gif|max:10240',
        ];

        $oc = request()->all('open_call_id');
        $openCall = OpenCall::findOrFail($oc['open_call_id']);

        if($openCall->formField->count()) {
            foreach ($openCall->formField as $field) {
                $customRules['custom_'.$field->field_name] = $this->getRuleBasedOnFieldType($field);
            }

            $rules = [...$rules, ...$customRules];
        }

        return $rules;
    }

    /**
     * Returns the rules for opencall fields.
     *
     * @param object  $field
     * @return string
     */
    public function getRuleBasedOnFieldType($field) : string
    {
        switch ($field->field_type) {
            case 'text':
                $rule = "min:1|max:1000";
                if ($field->field_is_required === 1)
                    $rule .= '|required';
                break;

            case 'number':
                $rule = "integer";
                if ($field->field_is_required === 1)
                    $rule .= '|required';
                break;

            case 'email':
                $rule = "email:rfc|min:3|max:1000";
                if ($field->field_is_required === 1)
                    $rule .= '|required';
                break;

            case 'password':
                $rule = "min:1|max:50";
                if ($field->field_is_required === 1)
                    $rule .= '|required';
                break;

            case 'textarea':
                $rule = "min:1|max:5000";
                if ($field->field_is_required === 1)
                    $rule .= '|required';
                break;

            case 'image':
                $rule = "mimes:jpg,jpeg,png,gif";
                if ($field->field_is_required === 1)
                    $rule .= '|required';
                break;

            case 'file':
                $rule = "";
                if ($field->field_is_required === 1)
                    $rule .= 'required';
                break;

            case 'select':
                $rule = "";
                if ($field->field_is_required === 1)
                    $rule .= 'required';
                break;

            case 'multiselect':
                $rule = "";
                if ($field->field_is_required === 1)
                    $rule .= 'required';
                break;

            default:
                # code...
                break;
        }

        return $rule;
    }
}
