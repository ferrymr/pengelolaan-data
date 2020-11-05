<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KonfirmasiDaftar extends Model
{
    protected $table    = 'tb_konfirmasi_daftar';
    protected $primaryKey = 'id';

    // no protection on field
    protected $guarded = ['id'];

    public function getAll() {
        return KonfirmasiDaftar::with('transaction.user', 'transaction.tbHeadJual')->get();
    }

    // ================================== relations ==================================

    public function transaction()
    {
        return $this->belongsTo(DaftarMember::class, 'tb_daftar_member_id');
    }
}
