<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateSettingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $arrays = [
            "name"          => "required",
            "slug"       => "required",
            "category"        => "required",
            "description"       => "required",
            "category"        => "required",
        ];

        return $arrays;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    // public function attributes()
    // {
    //     return [
    //         'translations.*.name' => trans('customeronboarding::site.site_name')
    //     ];
    // }
}