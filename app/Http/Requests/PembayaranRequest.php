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
            'id_instansi' => 'required|exists:m_instansi,id',
            'id_jenis_layanan' => 'required|exists:m_jenis_layanan,id',
            // 'no_pelanggan' => 'required',
            // 'nama_instansi' => 'required',
            // 'jenis_layanan' => 'required',
            'total_mbps'    => 'required',
            'nominal_pembayaran'    => 'required',
            'status'    => 'required',
            'photo'    => 'required|image',
        ];
    }

}

            