<?php

namespace App;
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cashback extends Model
{
    protected $table = "tb_cashback";

    // protected $primaryKey = "no_member";

    // public $incrementing = false;

    // protected $fillable = [
    //     'no_member',
    //     'nama',
    //     'reg',
    //     'pp',
    //     'pgp',
    //     'pgl',
    //     'pr',
    //     'title',
    //     'prs',
    //     'cb_pribadi',
    //     'cb_group',
    //     'rabat',
    //     'cb_total',
    //     'tanggal',
    //     'kade_dr',
    //     'kode_up',
    //     'mark'
    // ];

    public function getAll()
    {
        return Cashback::all();
    }

    public function callGroup($tanggal)
    {
        $data = Cashback::where('tanggal', $tanggal)
            ->select('no_member', 'pp')
            ->get();

        return $data;
    }

    public function callLevel($tanggal)
    {
        $data = Cashback::where('tanggal', $tanggal)
            ->select('no_member', 'pgp')
            ->get();

        return $data;
    }

    public function callTitle($tanggal)
    {
        $data = Cashback::where('tanggal', $tanggal)
            ->select('no_member', 'pp', 'pgp', 'pgl', 'title')
            ->get();

        return $data;
    }

    public function getGroup($tanggal, $member)
    {
        $data = Cashback::where('tanggal', $tanggal)
            ->where('kode_up', $member)->orderBy('no_member')
            ->select(Cashback::raw('SUM(pp) AS poin'))
            ->get();

        return $data;
    }

    public function getLevel($tanggal, $member)
    {
        $data = Cashback::where('tanggal', $tanggal)
            ->where('kode_up', $member)->orderBy('no_member')
            ->select(Cashback::raw('SUM(pgp) AS poin'))
            ->get();

        return $data;
    }

    public function editCashback($request, $kunci)
    {
        $data = Cashback::where('no_member', $kunci)->update($request);

        if (!empty($data)) {
            return $data;
        } else {
            return false;
        }
    }
}
