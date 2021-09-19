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
        'status_pembayaran',
        'bukti_transfer',
    ];

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

    public function instansi()
    {
        return $this->belongsTo(Instansi::class,'id_instansi','id');
    }

    public function layanan()
    {
        return $this->belongsTo(JenisLayanan::class,'id_jenis_layanan','id');
    }

   
}
