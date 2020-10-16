<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GalleryRequest;
use App\Http\Requests\CreateGalleryRequest;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use App\Models\Gallery;
use App\Models\User;
use App\Models\Role;
use App\Models\Barang;
use File;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Exception;

class GalleryController extends Controller
{
    public function __construct (User $user, Role $role, Gallery $gallery) 
    {
        $this->userRepo     = $user;
        $this->roleRepo     = $role;
        $this->galleryRepo   = $gallery;
    }
    
    public function index()
    {
        $user = Auth::user();
        $gallery = $this->galleryRepo->getAll();

        return view('backend.master.gallery.index')->with([
            'user' => $user,
            'gallery' => $gallery
        ]);
        
        
    }

    public function datatable() 
    {
        $gallery = $this->galleryRepo->getAll();

        return Datatables::of($gallery)
            ->editColumn('image', function($gallery) {
                return route('admin.gallery.getGambar', $gallery->id);                
            })
            ->addColumn('action', function ($gallery){
                return [
                    'edit' => route('admin.gallery.edit', $gallery->id),
                    'hapus' => route('admin.gallery.delete', $gallery->id),
                ];
            })
            ->escapeColumns([])
            ->make(true);
    }

    public function getGallery($roleId) {
        return $this->galleryRepo->getGallery($roleId);
    }

    public function create()
    {
        $user = Auth::user();
        $roles = $this->userRepo->getAll();
        
        return view('backend.master.gallery.create')->with([
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    public function store(Request $request)
    {
        $gallery = new Gallery();

        $gallery->kategori = $request->input('kategori');
        $gallery->nama_produk = $request->input('nama_produk');
        $gallery->jenis = $request->input('jenis'); 
        $jumlah = DB::table('tb_gallery')->where('kategori', $gallery->kategori)->count(); 
        if ($jumlah>2){
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Data produk melebihi maksimal</strong>')->error()->important();
            return redirect()->route('admin.gallery.index');
            
        } else{
            if(!empty($request->file('gambar'))) {
                // upload file
                $file = $request->file('gambar');
                $filename = 'product-' . date('YmdHis') . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('public/product', $filename);
            }  else {
                $filename = '';
            }
    
            $gallery->gambar = $gallery->nama_file = $filename;
    
            $gallery->save();
            return redirect()->route('admin.gallery.index')->with('success', 'Data berhasil diupload');

        }     

       
        
    }

    public function update(CreateGalleryRequest $request, $id)
    {
        

        // password kosong
        $param = array(
            "id" => $request->input('id'),
            "gambar" => $request->input('gambar'),
            "kategori" => $request->input('kategori'),
            "nama_produk" => $request->input('nama_produk'),
            "jenis" => $request->input('jenis'),
            
            
        );
    
        $gallery = $this->galleryRepo->editGallery($param, $id, $request->input('role_id'));

        if(!$this->galleryRepo->error) {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Data berhasil diupdate</strong>')->success();
            return redirect()->route('admin.gallery.index');
        } else {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>User </strong> ' . $this->galleryRepo->error)->error()->important();
            return redirect()->route('admin.gallery.edit')->withInput()->withError();
        }
    }

    public function edit($id)
    {
        
        $user = Auth::user();
        $gallery = Gallery::where('id', $id)->first();
        $roles = $this->roleRepo->getAll();

        return view('backend.master.gallery.edit')->with([
            'user' => $user,
            'roles' => $roles,
            'gallery' =>$gallery
        ]);
    }

    public function destroy($id)
    {
        $gallery = Gallery::where('id', $id)->delete();
        if(!empty($gallery)) {
            flash()->error('<i class="fa fa-info"></i>&nbsp; <strong>Data berhasil dihapus</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>');
            return redirect()->route('admin.gallery.index');
        } else {
            flash()->error('<i class="fa fa-info"></i>&nbsp; <strong>Data Tidak Ditemukan</strong>');
            return redirect()->route('admin.gallery.index');
        }
        
    }

    public function getGambar($id) {

        // get icon
        $gambar = $this->galleryRepo->findId($id);
        
        // Access local storage
        $path = storage_path('app/public/product/' . $gambar->gambar);

        if (!File::exists($path)) {
            abort(404);
        }

        // Return file
        return (new Response(File::get($path), 200))
              ->header('Content-Type', File::mimeType($path));
        
    }

}
