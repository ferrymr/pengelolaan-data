<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateBarangRequest;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use App\Models\Barang;
use App\Models\User;
use App\Models\Role;
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

        return view('backend.store.barang.index')->with([
            'user' => $user,
            'barang' => $barang
        ]);
    }

    public function datatable() 
    {
        $barang = $this->barangRepo->getAll();

        return Datatables::of($barang)
            // ->editColumn('role', function($user) {
            //     return $user->roles[0]->display_name;
            // })
            // ->editColumn('created_at', function($user) {
            //     return date('d F Y', strtotime($user->created_at));
            // })
            ->addColumn('action', function ($barang){
                return [
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
        
        return view('backend.store.barang.create')->with([
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    public function store(CreateBarangRequest $request)
    {
        $barang = $this->barangRepo->addBarang($request->all());

        if(!$this->barangRepo->error) {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Barang Berhasil Ditambah</strong>')->success();
            return redirect()->route('admin.barang.index');
        } else {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>User </strong> ' . $this->barangRepo->error)->error()->important();
            return redirect()->route('admin.barang.add')->withInput()->withError();
        }
    }

    public function show($kode_barang)
    {
        // wait.....
    }

    public function edit($kode_barang)
    {
        // $data = DB::table('tb_barang')->where('kode_barang', $kode_barang)->first();
        // return view('backend.store.barang.edit', compact('data'));
        $user = Auth::user();
        $barang = Barang::where('kode_barang', $kode_barang)->first();
        $roles = $this->roleRepo->getAll();
        
        // return view('backend.store.barang.edit')->with([
        //     'user' => $user,
        //     'roles' => $roles,
        // ]);
        // $barang = Auth::Barang();
        // $currentBarang = $this->barangRepo->findId($kode_barang);
        // // $roles = $this->roleRepo->getAll();

        return view('backend.store.barang.edit')->with([
            'user' => $user,
            'roles' => $roles,
            'barang' =>$barang
        ]);
    }
    
    public function update(CreateBarangRequest $request, $kode_barang)
    {
        // dd($request->all());

        // password kosong
        $param = array(
            "kode_barang" => $request->input('kode_barang'),
            "nama" => $request->input('nama'),
            "jenis" => $request->input('jenis'),
            "stok" => $request->input('stok'),
            "poin" => $request->input('poin'),
        );
    
        $barang = $this->barangRepo->editBarang($param, $kode_barang, $request->input('role_id'));

        if(!$this->barangRepo->error) {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Barang berhasil diupdate</strong>')->success();
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
            flash()->success('<i class="fa fa-info"></i>&nbsp; <strong>Barang berhasil dihapus</strong>');
            return redirect()->route('admin.barang.index');
        } else {
            flash()->success('<i class="fa fa-info"></i>&nbsp; <strong>Barang Tidak Ditemukan</strong>');
            return redirect()->route('admin.barang.index');
        }
    }
}
