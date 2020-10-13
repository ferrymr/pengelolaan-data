<?php

namespace App;
namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class SeriesDetail extends Model
{
    protected $table = "tb_det_pack";

    protected $primaryKey = "kode_pack";

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'kode_pack',
        'kode_barang',
        'nama',
        'jumlah'
    ];

    public function getAll() 
    {
        return SeriesDetail::all();
    }

    public function findId($kode_pack) 
    {
        $data = SeriesDetail::where('kode_pack', $kode_pack)->get();

        if(!empty($data)) {
            return $data;
        } else {
            return false;
        }
    }

    public function deleteSeries($kode_pack) 
    {
        $data = SeriesDetail::find($kode_pack);
        
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
