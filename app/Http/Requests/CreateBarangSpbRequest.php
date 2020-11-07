<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateBarangSpbRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $arrays = [
            "no_member" => "required",
            "kode_barang"          => "required",
            "nama" => "required",
            "stok"       => "required",
            "poin"         => "nullable",
            "berat" => "nullable",
            "jenis" => "required",
            "h_nomem" => "nullable",
            "h_member" => "nullable",
            "bpom" => "nullable",
            "tgl_eks" => "nullable",
            "stats" => "nullable",
            "deskripsi" => "nullable",
            "cara_pakai" => "nullable",

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