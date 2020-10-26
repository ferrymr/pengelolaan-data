<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateBarangRequest;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use App\Models\Barang;
use App\Models\BarangImages;
use App\Models\User;
use App\Models\Gallery;
use Illuminate\Http\Response;
use DB;
use File;

class BarangController extends Controller
{
    public function __construct (User $user, Barang $barang) 
    {
        $this->userRepo     = $user;
        $this->barangRepo   = $barang;
    }
    
    public function index()
    {
        $user = Auth::user();
        $barang = $this->barangRepo->getAll();

        return view('backend.master.barang.index')->with([
            'user' => $user,
            'barang' => $barang
        ]);
    }

    public function datatable() 
    {
        $barang = $this->barangRepo->getAll();

        return Datatables::of($barang)
            ->editColumn('image', function($barang) {
                if($barang->barangImages()->first()) {
                    return route('admin.barang.barang-image', $barang->barangImages()->first()->id);
                } else {
                    return '../img/no-image-barang.jpg';
                }
            })
            ->addColumn('action', function ($barang){
                return [
                    'edit' => route('admin.barang.edit', $barang->id),
                    'hapus' => route('admin.barang.delete', $barang->kode_barang),
                ];
            })
            ->escapeColumns([])
            ->make(true);
    }

    public function create()
    {
        $user = Auth::user();
        
        return view('backend.master.barang.create')->with([
            'user' => $user,
        ]);

    }

    public function store(Request $request)
    {
        $barang = new Barang();
        
        if(!empty($request->input('bpom'))) {$hasil = 1;} else {$hasil = 0;}
        if(!empty($request->input('stats'))) {$stats = 1;} else {$stats = 0;}
        $barang->kode_barang = $request->input('kode_barang');
        $barang->nama = $request->input('nama');
        $barang->jenis = $request->input('jenis');
        $barang->poin = $request->input('poin');
        $barang->h_nomem = $request->input('h_nomem');
        $barang->h_member = $request->input('h_member');
        $barang->berat = $request->input('berat');
        $barang->bpom = $hasil;
        $barang->tgl_eks = $request->input('tgl_eks');
        $barang->stats = $stats;
        $barang->deskripsi = $request->input('deskripsi');
        $barang->cara_pakai = $request->input('cara_pakai');
        $jumlah = DB::table('tb_barang')->where('kode_barang', $barang->kode_barang)->count(); 
        if ($jumlah>0){
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Kode barang sudah ada</strong>')->error()->important();
            return redirect()->route('admin.barang.add');
        } else{
            // save template
            $this->barangRepo->addBarang($input);
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Data barang berhasil ditambah</strong>')->success()->important();
            return redirect()->route('admin.barang.index');
        }        
    }    

    public function edit($id)
    {        
        $user = Auth::user();
        $barang = $this->barangRepo->findId($id);
        $barangImages = BarangImages::where('tb_barang_id', $id)->get();

        return view('backend.master.barang.edit')->with([
            'user' => $user,
            'barang' => $barang,
            'barangImages' => $barangImages
        ]);
    }
    
    public function update(CreateBarangRequest $request, $kode_barang)
    {
        // password kosong
        $param = array(
            "kode_barang" => $request->input('kode_barang'),
            "nama" => $request->input('nama'),
            "jenis" => $request->input('jenis'),
            "stok" => $request->input('stok'),
            "poin" => $request->input('poin'),
            "berat" => $request->input('berat'),
            "satuan" => $request->input('satuan'),
            "h_nomem" => $request->input('h_nomem'),
            "h_member" => $request->input('h_member'),
            "deskripsi" => $request->input('deskripsi'),
            "cara_pakai" => $request->input('cara_pakai')
        );
    
        $barang = $this->barangRepo->editBarang($param, $kode_barang, $request->input('role_id'));

        if(!$this->barangRepo->error) {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Data barang berhasil diupdate</strong>')->success()->important();
            return redirect()->route('admin.barang.index');
        } else {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>User </strong> ' . $this->barangRepo->error)->error()->important();
            return redirect()->route('admin.barang.edit')->withInput()->withError();
        }
    }
    
    public function destroy($kode_barang)
    {
        $barang = Barang::where('kode_barang', $kode_barang)->delete();
        if(!empty($barang)) {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Data Barang berhasil dihapus</strong>')->error()->important();
            return redirect()->route('admin.barang.index');
        } else {
            flash()->error('<i class="fa fa-info"></i>&nbsp; <strong>Data Barang Tidak Ditemukan</strong>');
            return redirect()->route('admin.barang.index');
        }
    }

    // ===================== BARANG IMAGE =========================

    public function storeBarangImage(Request $request)
    {
        
        if(!empty($request->file('nama_file'))) {
            $sort = 1;
            foreach ($request->file('nama_file') as $file) {
                $nama_file = 'barang-'.$sort.'-'. $request->input('barang_id') .'-' . date('YmdHis') . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('public/barang', $nama_file);

                $barang = $this->barangRepo->addbarangImage($request->input('barang_id'), $nama_file);
                $sort++;
            }
        }  else {
            $nama_file = "";
        }         

        if(!empty($nama_file)) {
            flash('<strong>Foto Barang Berhasil Ditambah</strong>')->success()->important();
            return redirect()->route('admin.barang.edit', $request->input('barang_id'));
        } else {
            flash('<strong>Foto Barang </strong> ' . $this->barangRepo->error)->error()->important();
            return redirect()->route('admin.barang.edit', $request->input('barang_id'))->withInput()->withError();
        }
    }

    public function getbarangImage($id) {
        $barangImage = BarangImages::find($id);
        
        if(!$barangImage) {
            abort(404); 
        }

        // Access local storage
        $path = storage_path('app/public/barang/' . $barangImage->nama_file);

        if (!File::exists($path)) {
            abort(404);
        }

        // Return file
        return (new Response(File::get($path), 200))
              ->header('Content-Type', File::mimeType($path));
    }

    public function deletebarangImage($barangId, $id) {
        $data = BarangImages::find($id);
        if(!empty($data)) {
            BarangImages::where('id', $id)->delete();

            // unlink image
            if(file_exists(base_path(). '/storage/app/public/barang/'. $data->nama_file)) {
                unlink(base_path(). '/storage/app/public/barang/'. $data->nama_file);
            }

            $result = true;
        } else {
            $result = false;
        }

        if($result) {
            flash('<strong>Foto Barang Berhasil Dihapus</strong>')->success()->important();
            return redirect()->route('admin.barang.edit', $barangId);
        } else {
            flash('<strong>Foto Barang Gagal Dihapus</strong> ')->error()->important();
            return redirect()->route('admin.barang.edit', $barangId)->withInput()->withError();
        }
    }
    
}
