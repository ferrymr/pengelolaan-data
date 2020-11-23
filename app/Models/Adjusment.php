<?php

namespace App;
namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Adjusment extends Model
{
    protected $table = "tb_head_so";

    protected $primaryKey = "no_so";

    public $incrementing = false;
    
    protected $fillable = [
        'no_so', 
        'tanggal', 
        'kasir',
        'jenis',
        'catatan', 
        'note', 
        'pos'
    ];

    public function getAll() 
    {
        return Adjusment::all();
    }

    public function deleteAdjusment($no_so) 
    {
        $data = Adjusment::find($no_so);
        
        if(!empty($data)) {
            $data->delete();
            return $data;
        } else {
            return false;
        }
    }

    public function findId($no_so) 
    {
        $data = Adjusment::find($no_so);

        if(!empty($data)) {
            return $data;
        } else {
            return false;
        }
    }

    public function autoCode()
    {
        $data = Adjusment::select('no_so')->orderBy('no_so', 'DESC')->first();

        return $data;
    }

    public function editAdjusment($request, $no_so) 
    {
        $data = Adjusment::where('no_so', $no_so)->update($request);

        if(!empty($data)) {
            return $data;
        } else {
            return false;
        }
    }
}
