<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateAdjusmentRequest extends FormRequest
{
    public function rules()
    {
        $arrays = [
            "no_so"     => "required",
            "tanggal"   => "required",
            "jenis"     => "required",
            "note"      => "required",
            "pos"       => "required",
        ];

        return $arrays;
    }
    
    public function authorize()
    {
        return true;
    }
}