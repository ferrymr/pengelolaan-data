<?php

namespace App;
namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class AdjusmentDetail extends Model
{
    protected $table = "tb_det_so";

    protected $primaryKey = "no_so";

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'no_do',
        'kode_barang',
        'nama',
        'stok',
        'jumlah',
        'hasil',
        'harga',
        'total'
    ];

    public function getAll() 
    {
        return AdjusmentDetail::all();
    }

    public function findId($no_so) 
    {
        $data = AdjusmentDetail::where('no_so', $no_so)->get();

        if(!empty($data)) {
            return $data;
        } else {
            return false;
        }
    }

    public function deleteAdjusmentDetail($no_so) 
    {
        $data = AdjusmentDetail::find($no_so);
        
        if(!empty($data)) {
            $data->delete();
            return $data;
        } else {
            return false;
        }
    }

    // public function series()
    // {
    //     return $this->belongsTo(Series::class,'kode_pack','kode_pack');
    // }
}
