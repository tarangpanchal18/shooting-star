<?php

namespace App\Http\Controllers;

use App\Models\OpenCall;
use Illuminate\Http\Request;

class OpenCallUserFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(OpenCall $opencall)
    {
        $openCallList = OpenCall::where('end_date', '>=', date('Y-m-d'))->where('status', 'Active')->get();

        return view('opencall_form', [
            'pageName' => $opencall->title,
            'opencall' => $opencall,
            'opencallList' => $openCallList,
            'customField' => $opencall->formfield->where('status', 'Active'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $forms = $request->validate($this->getRulesArray($request->open_call_id));
        dd($forms);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Returns the rules for opencall form validation.
     *
     * @param  integer  $id
     * @return array
     */
    public function getRulesArray($opencallId) : array
    {
        $rules = [
            'open_call_id' => 'required|integer',
            'name' => 'required|min:3|max:50',
            'email' => 'required|email:rfc',
            'phone' => 'required|integer|integer|min_digits:9|max_digits:12',
            'website' => 'required|url',
            'instagram' => 'required|url',
            'comment' => '',
        ];

        $openCall = OpenCall::findOrFail($opencallId);
        if($openCall->formField->count()) {
            foreach ($openCall->formField as $field) {
                $customRules[$field->field_name] = $this->getRuleBasedOnFieldType($field);
            }

            $rules = array_merge($rules, $customRules);
        }

        return $rules;
    }

    public function getRuleBasedOnFieldType($field)
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
                    $rule .= '|required';
                break;

            case 'select':
                $rule = "";
                if ($field->field_is_required === 1)
                    $rule .= '|required';
                break;

            case 'multiselect':
                $rule = "";
                if ($field->field_is_required === 1)
                    $rule .= '|required';
                break;

            default:
                # code...
                break;
        }

        return $rule;
    }
}
