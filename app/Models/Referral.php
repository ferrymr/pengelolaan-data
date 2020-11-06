<?php

namespace App;
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    protected $table = "users";

    protected $primaryKey = "no_member";

    public $incrementing = false;

    protected $fillable = [
        'kode_up',
        'kode_dr'
    ];

    public function getAll()
    {
        return Referral::where('tipe', 'R')
        ->orderBy('no_member')->get();
    }

    public function findId($no_member)
    {
        $data = Referral::find($no_member);

        if(!empty($data)) {
            return $data;
        } else {
            return false;
        }
    }

    public function getDownline($no_member)
    {
        return Referral::where('kode_up', $no_member)
        ->orderBy('no_member')->get();
    }

    public function getUpline($kode_up)
    {
        $data = Referral::find($kode_up);

        if (!empty($data)) {
            return $data;
        } else {
            return false;
        }
    }

    public function deleteReferral($no_member) 
    {
        // $data = Series::find($kode_pack);
        
        // if(!empty($data)) {
        //     $data->delete();
        //     return $data;
        // } else {
        //     return false;
        // }
    }

    public function editReferral($request, $no_member) 
    {
        $data = Referral::where('no_member', $no_member)->update($request);

        if(!empty($data)) {
            return $data;
        } else {
            return false;
        }
    }
}
