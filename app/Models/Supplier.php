<?php

namespace App;
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'tb_supplier';
    protected $primarykey = 'kode_supp';
    public $incrementing = false;
    protected $fillable = [
        'kode_supp',
        'nama',
        'alamat',
        'kota',
        'pos',
        'telp',
        'email'
    ];

    public function getAll() {
        return Supplier::all();
    }

    public function getSupplier($roleId) {
        return Supplier::whereHas('roles', function($q) use ($roleId)
        {
            $q->where('kode_supp', $roleId);
        })->get();
    }

    public function addSupplier($request) 
    {
        $supplier = array(
            'kode_supp' => $request['kode_supp'],
            'nama' => $request['nama'],
            'alamat' => $request['alamat'],
            'kota' => $request['kota'],
            'pos' => $request['pos'],
            'telp' => $request['telp'],
            'email' => $request['email'],
            
        );

        $supplier = Supplier::create($supplier);
        return $supplier;
    }

    public function editSupplier($request, $kode_supp) {
        
        $data = Supplier::where('kode_supp', $kode_supp)->update($request);

        if(!empty($data)) {
            return $data;
        } else {
            return false;
        }
    }
}
