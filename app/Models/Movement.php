<?php

namespace App;
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    protected $table = 'view_stom';
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
            'no_faktur' => $request['no_faktur'],
            'id_member' => $request['id_member'],
            'nama' => $request['nama'],
            'tanggal' => $request['tanggal'],
            'jenis_movement' => $request['jenis_movement'],
            'kode_barang' => $request['kode_barang'],
            'nama_barang' => $request['nama_barang'],
            'jenis_barang' => $request['jenis_barang'],
            'jumlah' => $request['jumlah'],
            'user' => $request['user'],
            'waktu' => $request['waktu'],
            'note' => $request['note']
        );

        $movement = Movement::create($movement);
        return $movement;
    }
}
