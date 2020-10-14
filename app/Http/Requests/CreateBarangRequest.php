<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateBarangRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $arrays = [
            "kode_barang"          => "required",
            "nama" => "required",
            "stok"       => "nullable",
            "poin"         => "required",
            "h_hpb"         => "required",
            "h_ppnj"         => "required",
            "h_beli"         => "required",
            "h_ppnb"         => "required",
            "bpom"         => "required",
            "tgl_eks"         => "required",
            "stats"         => "required",
            "stok_his"         => "required",
            "log_his"         => "required",
            "pic"         => "required",
            "cat"         => "required",
            "diskon"         => "required",
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