<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Requests\CreateSupplierRequest;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    public function __construct (User $user, Role $role, Supplier $supplier) 
    {
        $this->userRepo     = $user;
        $this->roleRepo     = $role;
        $this->supplierRepo   = $supplier;
    }
    
    public function index()
    {
        $user = Auth::user();
        $supplier = $this->supplierRepo->getAll();

        return view('backend.master.supplier.index')->with([
            'user' => $user,
            'supplier' => $supplier
        ]);
    }

    public function datatable() 
    {
        $supplier = $this->supplierRepo->getAll();

        return Datatables::of($supplier)
            // ->editColumn('role', function($user) {
            //     return $user->roles[0]->display_name;
            // })
            // ->editColumn('created_at', function($user) {
            //     return date('d F Y', strtotime($user->created_at));
            // })
            ->addColumn('action', function ($supplier){
                return [
                    'edit' => route('admin.supplier.edit', $supplier->kode_supp),
                    'hapus' => route('admin.supplier.delete', $supplier->kode_supp),
                ];
            })
            ->escapeColumns([])
            ->make(true);
    }

    public function getSupplier($roleId) {
        return $this->supplierRepo->getSupplier($roleId);
    }

    public function create()
    {
        $user = Auth::user();
        $roles = $this->userRepo->getAll();
        
        return view('backend.master.supplier.create')->with([
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    public function store(Request $request)
    {
        $supplier = new Supplier();

        $supplier->kode_supp = $request->input('kode_supp');
        $supplier->nama = $request->input('nama');
        $supplier->alamat = $request->input('alamat');
        $supplier->kota = $request->input('kota');
        $supplier->pos = $request->input('pos');
        $supplier->telp = $request->input('telp');
        $supplier->email = $request->input('email'); 
        $jumlah = DB::table('tb_supplier')->where('kode_supp', $supplier->kode_supp)->count(); 
        if ($jumlah>0){
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Kode supplier sudah ada</strong>')->error()->important();
            return redirect()->route('admin.supplier.index');
            
        } else{
            $supplier->save();
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Data supplier berhasil ditambah</strong>')->success()->important();
            return redirect()->route('admin.supplier.index');

        } 
    }

    public function edit($kode_supp)
    {
        
        $user = Auth::user();
        $supplier = Supplier::where('kode_supp', $kode_supp)->first();
        $roles = $this->roleRepo->getAll();

        return view('backend.master.supplier.edit')->with([
            'user' => $user,
            'roles' => $roles,
            'supplier' =>$supplier
        ]);
    }

    public function update(CreateSupplierRequest $request, $kode_supp)
    {

        // password kosong
        $param = array(
            "kode_supp" => $request->input('kode_supp'),
            "nama" => $request->input('nama'),
            "alamat" => $request->input('alamat'),
            "kota" => $request->input('kota'),
            "pos" => $request->input('pos'),
            "telp" => $request->input('telp'),
            "email" => $request->input('email'),
        );
    
        $supplier = $this->supplierRepo->editSupplier($param, $kode_supp, $request->input('role_id'));

        if(!$this->supplierRepo->error) {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Data supplier berhasil diupdate</strong>')->success()->important();
            return redirect()->route('admin.supplier.index');
        } else {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>User </strong> ' . $this->supplierRepo->error)->error()->important();
            return redirect()->route('admin.supplier.edit')->withInput()->withError();
        }
    }

    public function destroy($kode_supp)
    {
        $supplier = Supplier::where('kode_supp', $kode_supp)->delete();
        if(!empty($supplier)) {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Data Supplier berhasil dihapus</strong>')->error()->important();
            return redirect()->route('admin.supplier.index');
        } else {
            flash()->error('<i class="fa fa-info"></i>&nbsp; <strong>Data Tidak Ditemukan</strong>');
            return redirect()->route('admin.supplier.index');
        }
    }
}
