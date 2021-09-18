<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'transaksi';
    protected $primarykey = 'id';
    protected $fillable = [
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
    	return $this->belongsToMany('App\Models\Instansi');
    }

    public function layanan()
    {
    	return $this->belongsToMany('App\Models\JenisLayanan');
    }
}
