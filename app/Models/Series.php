<?php

namespace App;
namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    protected $table = "tb_head_pack";

    protected $primaryKey = "kode_pack";

    public $incrementing = false;
    
    protected $fillable = [
        'kode_pack', 
        'nama_pack', 
        'jenis_pack',
        'h_member',
        'poin', 
        'h_nomem', 
        'berat', 
        'bpom'
    ];

    public function getAll() 
    {
        return Series::all();
    }

    public function deleteSeries($kode_pack) 
    {
        $data = Series::find($kode_pack);
        
        if(!empty($data)) {
            $data->delete();
            return $data;
        } else {
            return false;
        }
    }

    public function findId($kode_pack) 
    {
        $data = Series::find($kode_pack);

        if(!empty($data)) {
            return $data;
        } else {
            return false;
        }
    }

    public function editSeries($request, $kode_pack) 
    {
        $data = Series::where('kode_pack', $kode_pack)->update($request);

        if(!empty($data)) {
            return $data;
        } else {
            return false;
        }
    }

    // public function detail()
    // {
    //     return $this->hasMany(SeriesDetail::class);
    // }
}
