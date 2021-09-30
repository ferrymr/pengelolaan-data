<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PembayaranRequest extends FormRequest
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
     * @return array
     */

    public function rules()
    {
        return [
            'id_instansi' => 'required',
            'id_jenis_layanan' => 'required',
            // 'no_pelanggan' => 'required',
            // 'nama_instansi' => 'required',
            // 'jenis_layanan' => 'required',
            'total_mbps'    => 'required',
            'nominal_pembayaran'    => 'required',
            'status'    => 'required',
            'photo'    => 'required|image',
            'tgl_pembayaran' => date('Y-m-d')
        ];
    }

}

            