<?php

namespace App;
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\Carbon;
use App\Models\Barang;

class Gallery extends Model
{
    protected $table = 'tb_gallery';
    protected $primarykey = 'id';
    public $incrementing = false;
    protected $fillable = [
        'id',
        'gambar',
        'kategori',
        'nama_produk',
        'jenis',
        'nama_file'
        
    ];

    public function getAll() {
        return Gallery::all();
    }

    public function getGallery($roleId) {
        return Gallery::whereHas('roles', function($q) use ($roleId)
        {
            $q->where('id', $roleId);
        })->get();
    }

    public function addGallery($request) 
    {
        

        // $gallery = array(
            // 'gambar' => $request['gambar'],
            // 'kategori' => $request['kategori'],
            // 'nama_produk' => $request['nama_produk'],
            // 'jenis' => $request['jenis'],
            // 'nama_file' => $request['nama_file'],
            
        // );

        // $gallery = Gallery::create($gallery);
        // return $gallery;
    }

    public function deleteGallery($id) {
        $data = Gallery::find($id);
        
        if(!empty($data)) {
            $data->delete();
            return $data;
        } else {
            return false;
        }
    }

    public function findId($id) {
        $data = Gallery::find($id);
        if(!empty($data)) {
            return $data;
        } else {
            return false;
        }
    }

    public function editGallery($request, $id) {
        
        $data = Gallery::where('id', $id)->update($request);
        if(!empty($data)) {
            return $data;
        } else {
            return false;
        }
    }

    public function editUserMobile($request, $id) {
        $data = Gallery::where('id', $id)->update($request);

        if(!empty($data)) {
            return $data;
        } else {
            return false;
        }
    }

    public function barang() {
        return $this->belongsTo(Barang::class, 'kode_barang');
    }

    

    

}
