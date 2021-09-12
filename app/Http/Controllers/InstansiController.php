<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use Illuminate\Http\Request;
use App\Http\Requests\CreateInstansiRequest;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class InstansiController extends Controller
{
    public function __construct (User $user, Role $role, Instansi $instansi)
    {
        $this->userRepo     = $user;
        $this->roleRepo     = $role;
        $this->instansiRepo   = $instansi;
    }

    public function index()
    {
        $user = Auth::user();
        $instansi = $this->instansiRepo->getAll();

        return view('backend.master.instansi.index')->with([
            'user' => $user,
            'instansi' => $instansi
        ]);
    }

    public function datatable()
    {
        $instansi = $this->instansiRepo->getAll();

        return Datatables::of($instansi)
            ->addColumn('action', function ($instansi){
                return [
                    'edit' => route('admin.instansi.edit', $instansi->id),
                    'hapus' => route('admin.instansi.delete', $instansi->id),
                ];
            })
            ->escapeColumns([])
            ->make(true);
    }

    public function getInstansi($roleId) {
        return $this->instansiRepo->getInstansi($roleId);
    }

    public function create()
    {
        $user = Auth::user();
        $roles = $this->roleRepo->getAll();

        return view('backend.master.instansi.create')->with([
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    public function store(CreateInstansiRequest $request)
    {
        // dd($request->all());

        $instansi = $this->instansiRepo->addInstansi($request->all());

        if(!$this->instansiRepo->error) {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Instansi Berhasil Ditambah</strong>')->success();
            return redirect()->route('admin.instansi.index');
        } else {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Instansi </strong> ' . $this->instansiRepo->error)->error()->important();
            return redirect()->route('admin.instansi.add')->withInput()->withError();
        }
    }

    public function edit($id)
    {
        $user = Auth::user();
        $currentInstansi = $this->instansiRepo->findId($id);
        $roles = $this->roleRepo->getAll();

        return view('backend.master.instansi.edit')->with([
            'user' => $user,
            'currentInstansi' => $currentInstansi,
            'roles' => $roles,
        ]);
    }

    public function update(CreateInstansiRequest $request, $id)
    {
        $param = array(
            "no_pelanggan" => $request->input('no_pelanggan'),
            "nama_instansi" => $request->input('nama_instansi'),
        );

        $instansi = $this->instansiRepo->editInstansi($param, $id, $request->input('role_id'));

        if(!$this->instansiRepo->error) {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Data instansi berhasil diupdate</strong>')->success()->important();
            return redirect()->route('admin.instansi.index');
        } else {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Instansi </strong> ' . $this->instansiRepo->error)->error()->important();
            return redirect()->route('admin.instansi.edit')->withInput()->withError();
        }
    }

    public function destroy($id)
    {
        $instansi = Instansi::where('id', $id)->delete();
        if(!empty($instansi)) {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Data instansi berhasil dihapus</strong>')->error()->important();
            return redirect()->route('admin.instansi.index');
        } else {
            flash()->error('<i class="fa fa-info"></i>&nbsp; <strong>Data Tidak Ditemukan</strong>');
            return redirect()->route('admin.instansi.index');
        }
    }
}
