<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateViewBarangRequest extends FormRequest
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
            "berat" => "nullable",
            "jenis" => "required",
            "h_nomem" => "nullable",
            "h_member" => "nullable",
            "bpom" => "nullable",
            "tgl_eks" => "nullable",
            "stats" => "nullable",
            "deskripsi" => "nullable",
            "cara_pakai" => "nullable",
            // "h_hpp" => "nullable",
            // "h_hpb"         => "required",
            // "h_ppnj"         => "required",
            // "h_beli"         => "required",
            // "h_ppnb"         => "required",
            // "bpom"         => "required",
            // "tgl_eks"         => "required",
            // "satuan"         => "required",
            // "stok_his"         => "required",
            // "log_his"         => "required",
            // "pic"         => "required",
            // "cat"         => "required",
            // "diskon"         => "required",
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