<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateReferralRequest extends FormRequest
{
    public function rules()
    {
        $arrays = [
            "no_member" => "required",
            "nama"      => "required",
            "info_u"    => "required",
            "kode_up"   => "required",
            "no_down"   => "required",
            "namas"     => "required",
            "info_d"    => "required",
        ];

        return $arrays;
    }
    
    public function authorize()
    {
        return true;
    }
}