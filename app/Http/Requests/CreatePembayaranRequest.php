<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreatePembayaranRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $arrays = [
            "total_mbps"          => "required",
            "id_instansi"       => "required",
            "id_jenis_layanan"       => "required",
            "nominal_pembayaran"         => "required",
            "status_pembayaran"       => "required",
            "bukti_transfer"       => "required",
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
