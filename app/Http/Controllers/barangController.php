<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateBarangRequest;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use App\Models\Barang;
use App\Models\User;
use App\Models\Role;
use App\Models\Gallery;
use App\Models\ViewBarang;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function __construct (User $user, Role $role, Barang $barang) 
    {
        $this->userRepo     = $user;
        $this->roleRepo     = $role;
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
            ->addColumn('action', function ($barang){
                return [
                    'view' => route('admin.barang.view', $barang->kode_barang),
                    'edit' => route('admin.barang.edit', $barang->kode_barang),
                    'hapus' => route('admin.barang.delete', $barang->kode_barang),
                ];
            })
            ->escapeColumns([])
            ->make(true);
    }

    public function getBarang($roleId) {
        return $this->barangRepo->getBarang($roleId);
    }

    public function create()
    {
        $user = Auth::user();
        $roles = $this->userRepo->getAll();
        
        return view('backend.master.barang.create')->with([
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    public function store(Request $request)
    {
        $barang = new Barang();

        $barang->kode_barang = $request->input('kode_barang');
        $barang->nama = $request->input('nama');
        $barang->jenis = $request->input('jenis');
        $barang->poin = $request->input('poin');
        $barang->h_nomem = $request->input('h_nomem');
        $barang->h_member = $request->input('h_member');
        $barang->berat = $request->input('berat');
        $barang->bpom = $request->input('bpom');
        $barang->tgl_eks = $request->input('tgl_eks');
        $barang->stats = $request->input('stats');
        $barang->deskripsi = $request->input('deskripsi');
        $barang->cara_pakai = $request->input('cara_pakai'); 
        $jumlah = DB::table('tb_barang')->where('kode_barang', $barang->kode_barang)->count(); 
        if ($jumlah>0){
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Kode barang sudah ada</strong>')->error()->important();
            return redirect()->route('admin.barang.index');
            
        } else{
            $barang->save();
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Data barang berhasil ditambah</strong>')->success()->important();
            return redirect()->route('admin.barang.index');

        }  
        
    }
    

    public function view($kode_barang)
    {
        $user = Auth::user();
        $barang = Barang::where('kode_barang', $kode_barang)->first();
        $viewbarang = ViewBarang::where('kode_barang', $kode_barang)->get();
        $roles = $this->roleRepo->getAll();
        return view('backend.master.barang.view')->with([
            'user' => $user,
            'roles' => $roles,
            'barang' =>$barang,
            'viewbarang' =>$viewbarang
        ]);
    }

    public function edit($kode_barang)
    {
        
        $user = Auth::user();
        $barang = Barang::where('kode_barang', $kode_barang)->first();
        $roles = $this->roleRepo->getAll();

        return view('backend.master.barang.edit')->with([
            'user' => $user,
            'roles' => $roles,
            'barang' =>$barang
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

    
    
}
