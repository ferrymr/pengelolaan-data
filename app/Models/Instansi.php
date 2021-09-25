<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    protected $table = 'm_instansi';
    protected $primarykey = 'id';
    protected $fillable = [
        'no_pelanggan',
        'nama_instansi',
    ];

    public function getAll()
    {
        return Instansi::all();
    }

    public function getInstansi($roleId)
    {
        return Instansi::whereHas('roles', function ($q) use ($roleId) {
            $q->where('id', $roleId);
        })->get();
    }

    public function addInstansi($request)
    {
        $instansi = array(
            'no_pelanggan' => $request['no_pelanggan'],
            'nama_instansi' => $request['nama_instansi'],
        );

        $instansi = Instansi::create($instansi);
        return $instansi;
    }

    public function findId($id)
    {
        $data = Instansi::find($id);
        if (!empty($data)) {
            return $data;
        } else {
            return false;
        }
    }

    public function editInstansi($request, $id)
    {

        $data = Instansi::where('id', $id)->update($request);

        if (!empty($data)) {
            return $data;
        } else {
            return false;
        }
    }

    // ==========================Relation=================================
    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class,'id_instansi','id');
    }  

    
}
