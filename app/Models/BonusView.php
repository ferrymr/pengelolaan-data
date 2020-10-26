<?php

namespace App;
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BonusView extends Model
{
    protected $table = "vw_cashback";

    public function getAll()
    {
        return BonusView::all();
    }

    public function somePoin($awal, $akhir)
    {
        $data = BonusView::whereBetween('tanggal', [$awal, $akhir])
            ->where('tipe', 'R')->groupBy('no_member')->orderBy('no_member')
            ->select('no_member', 'nama', 'kode_up', 'kode_dr', 'kassir', 'tipe',
                BonusView::raw('SUM(poin) AS poin'))
            ->get();

        return $data;
    }

    public function morePoin($awal, $akhir, $member)
    {
        $data = BonusView::whereBetween('tanggal', [$awal, $akhir])
            ->where('tipe', 'M')->where('kode_up', $member)->orderBy('no_member')
            ->select(BonusView::raw('SUM(poin) AS poin'))
            ->get();

        return $data;
    }

    public function getRabat($awal, $akhir, $operator)
    {
        $data = BonusView::whereBetween('tanggal', [$awal, $akhir])
            ->where('kassir', $operator)->orderBy('no_member')
            ->select(BonusView::raw('SUM(poin) AS poin'))
            ->get();

        return $data;
    }

    public function getSponsor($awal, $akhir)
    {
        $data = BonusView::whereBetween('tanggal', [$awal, $akhir])
            ->whereIn('kode_barang', ['REG02', 'REG03', 'REG04', 'REG05'])
            ->where('tipe', 'R')->groupBy('kode_up')->orderBy('kode_up')
            ->select('kode_up', BonusView::raw('COUNT(kode_barang) AS jumlah'))
            ->get();

        return $data;
    }
}
