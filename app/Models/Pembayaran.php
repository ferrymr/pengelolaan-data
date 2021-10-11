<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $primarykey = 'id';
    protected $fillable = [
        'id_instansi',
        'id_jenis_layanan',
        'total_mbps',
        'nominal_pembayaran',
        'status',
        'photo',
        'tgl_pembayaran'
    ];

    
    public function instansi()
    {
        return $this->belongsTo(Instansi::class,'id_instansi','id');
    }
    
    public function layanan()
    {
        return $this->belongsTo(JenisLayanan::class,'id_jenis_layanan','id');
    }
    
    public function getPhotoAttribute($value)
    {
        return url('storage/' . $value);
    }
    public function getAll()
    {
        return Pembayaran::all();
    }
    
    public function getPembayaran($roleId)
    {
        return Pembayaran::whereHas('roles', function ($q) use ($roleId) {
            $q->where('id', $roleId);
        })->get();
    }

    public function findId($id)
    {
        $data = Pembayaran::find($id);
        if (!empty($data)) {
            return $data;
        } else {
            return false;
        }
    }

    public function editPembayaran($request, $id)
    {

        $data = Pembayaran::where('id', $id)->update($request);

        if (!empty($data)) {
            return $data;
        } else {
            return false;
        }
    }
}
