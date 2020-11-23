<?php

namespace App;
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    protected $table = 'tb_movement';
    protected $primarykey = 'no_faktur';
    public $incrementing = false;
    protected $fillable = [
        'no_faktur',
        'id_member',
        'nama',
        'tanggal',
        'jenis_movement',
        'kode_barang',
        'nama_barang',
        'jenis_barang',
        'jumlah',
        'user',
        'waktu',
        'note'
    ];

    public function getAll() {
        return Movement::all();
    }

    public function getMovement($roleId) {
        return Movement::whereHas('roles', function($q) use ($roleId)
        {
            $q->where('no_faktur', $roleId);
        })->get();
    }

    public function addMovement($request) 
    {
        $movement = array(
            'no_faktur' => $request['no_sm'],
            'id_member' => $request['no_member'],
            'nama' => $request['nama'],
            'tanggal' => $request['tgl_pinjam'],
            'jenis_movement' => $request['tipe_move'],
            'kode_barang' => $request['kode_barang'],
            'nama_barang' => $request['nama'],
            'jenis_barang' => $request['jenis'],
            'jumlah' => $request['jumlah'],
            'user' => $request['user'],
            'waktu' => $request['waktu'],
            'note' => $request['keterangan']
        );

        $movement = Movement::create($movement);
        return $movement;
    }
}
