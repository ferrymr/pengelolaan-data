<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateSeriesRequest extends FormRequest
{
    public function rules()
    {
        $arrays = [
            "kode_pack"     => "required",
            "nama_pack"     => "required",
            "h_nomem"       => "required",
            "h_member"      => "required",
            "poin"          => "required",
        ];

        return $arrays;
    }
    
    public function authorize()
    {
        return true;
    }
}