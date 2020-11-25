<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Barang;
use App\Models\Spb;

class SpbStock extends Model
{
    protected $table = 'tb_spb_stock';

    // no protection on field
    protected $guarded = ['id'];

    
    public function getBarangSpb($id) {
        $data = SpbStock::with('spb', 'barang')
                        ->where('tb_barang_id', $id)
                        ->get();

        if(!empty($data)) {
            return $data;
        } else {
            return false;
        }
    }

    // ======================== relations ========================

    public function spb()
    {
    	return $this->belongsTo('App\Models\Spb', 'tb_spb_id');
    }

    public function barang()
    {
    	return $this->belongsTo('App\Models\Barang', 'tb_barang_id');
    }

}
