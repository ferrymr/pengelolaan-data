<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisLayanan extends Model
{
    protected $table = 'm_jenis_layanan';
    protected $primarykey = 'id';
    protected $fillable = [
        'jenis_layanan',
    ];

    public function getAll()
    {
        return JenisLayanan::all();
    }

    public function getJenisLayanan($roleId)
    {
        return JenisLayanan::whereHas('roles', function ($q) use ($roleId) {
            $q->where('id', $roleId);
        })->get();
    }

    public function addJenisLayanan($request)
    {
        $layanan = array(
            'jenis_layanan' => $request['jenis_layanan'],
        );

        $layanan = JenisLayanan::create($layanan);
        return $layanan;
    }

    public function findId($id)
    {
        $data = JenisLayanan::find($id);
        if (!empty($data)) {
            return $data;
        } else {
            return false;
        }
    }

    public function editJenisLayanan($request, $id)
    {

        $data = JenisLayanan::where('id', $id)->update($request);

        if (!empty($data)) {
            return $data;
        } else {
            return false;
        }
    }

    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class, 'id');
    }
}
