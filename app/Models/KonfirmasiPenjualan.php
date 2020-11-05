<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KonfirmasiPenjualan extends Model
{
    protected $table = 'tb_konfirmasi_jual';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tb_head_jual_id', 
        'user_id', 
        'bank', 
        'rekening_number', 
        'rekening_name', 
        'filename', 
        'created_at',
        'updated_at'
    ];

    public function getAll() {
        return KonfirmasiPenjualan::with('transaction.user')
                                ->get();
    }

    // ================================== relations ==================================

    public function transaction()
    {
        return $this->belongsTo(TbHeadJual::class, 'tb_head_jual_id');
    }
}
