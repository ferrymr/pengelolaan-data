<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateGalleryRequest;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use App\Models\Gallery;
use App\Models\User;
use App\Models\Role;

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

        return view('backend.store.gallery.index')->with([
            'user' => $user,
            'gallery' => $gallery
        ]);
    }

    public function datatable() 
    {
        $gallery = $this->galleryRepo->getAll();

        return Datatables::of($gallery)
        ->addColumn('image', function ($gallery){
            return route('admin.gallery.index', $gallery->id);
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
        
        return view('backend.store.gallery.create')->with([
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
        $gallery->nama_file = $request->input('nama_file');

        if($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('assets/images', $filename);
            $gallery->gambar = $filename;
        }else{
            return $request;
            $gallery->gambar = '';
        }

        $gallery->save();
        return redirect()->route('admin.gallery.index')->with('success', 'Data berhasil diupload');
        
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
            // "nama_file" => $request->input('nama_file'),
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

        return view('backend.store.gallery.edit')->with([
            'user' => $user,
            'roles' => $roles,
            'gallery' =>$gallery
        ]);
    }

    public function destroy($id)
    {
        $gallery = Gallery::where('id', $id)->delete();
        if(!empty($gallery)) {
            flash()->success('<i class="fa fa-info"></i>&nbsp; <strong>Data berhasil dihapus</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>');
            return redirect()->route('admin.gallery.index');
        } else {
            flash()->success('<i class="fa fa-info"></i>&nbsp; <strong>Data Tidak Ditemukan</strong>');
            return redirect()->route('admin.gallery.index');
        }
        
    }

}
