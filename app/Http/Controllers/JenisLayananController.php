<?php

namespace App\Http\Controllers;

use App\Models\JenisLayanan;
use Illuminate\Http\Request;
use App\Http\Requests\CreateJenisLayananRequest;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class JenisLayananController extends Controller
{
    public function __construct (User $user, Role $role, JenisLayanan $layanan)
    {
        $this->userRepo      = $user;
        $this->roleRepo      = $role;
        $this->layananRepo   = $layanan;
    }

    public function index()
    {
        $user = Auth::user();
        $layanan = $this->layananRepo->getAll();

        return view('backend.master.layanan.index')->with([
            'user' => $user,
            'instansi' => $layanan
        ]);
    }

    public function datatable()
    {
        $layanan = $this->layananRepo->getAll();

        return Datatables::of($layanan)
            ->addColumn('action', function ($layanan){
                return [
                    'edit' => route('admin.layanan.edit', $layanan->id),
                    'hapus' => route('admin.layanan.delete', $layanan->id),
                ];
            })
            ->escapeColumns([])
            ->make(true);
    }

    public function getJenisLayanan($roleId) {
        return $this->instansiRepo->getJenisLayanan($roleId);
    }

    public function create()
    {
        $user = Auth::user();
        $roles = $this->roleRepo->getAll();

        return view('backend.master.layanan.create')->with([
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    public function store(CreateJenisLayananRequest $request)
    {
        // dd($request->all());

        $layanan = $this->layananRepo->addJenisLayanan($request->all());

        if(!$this->layananRepo->error) {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Jenis Layanan Berhasil Ditambah</strong>')->success();
            return redirect()->route('admin.layanan.index');
        } else {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Jenis Layanan </strong> ' . $this->layananRepo->error)->error()->important();
            return redirect()->route('admin.layanan.add')->withInput()->withError();
        }
    }

    public function edit($id)
    {
        $user = Auth::user();
        $currentLayanan = $this->layananRepo->findId($id);
        $roles = $this->roleRepo->getAll();

        return view('backend.master.layanan.edit')->with([
            'user' => $user,
            'currentLayanan' => $currentLayanan,
            'roles' => $roles,
        ]);
    }

    public function update(CreateJenisLayananRequest $request, $id)
    {
        $param = array(
            "jenis_layanan" => $request->input('jenis_layanan'),
        );

        $layanan = $this->layananRepo->editJenisLayanan($param, $id, $request->input('role_id'));

        if(!$this->layananRepo->error) {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Data instansi berhasil diupdate</strong>')->success()->important();
            return redirect()->route('admin.layanan.index');
        } else {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Instansi </strong> ' . $this->layananRepo->error)->error()->important();
            return redirect()->route('admin.layanan.edit')->withInput()->withError();
        }
    }

    public function destroy($id)
    {
        $layanan = JenisLayanan::where('id', $id)->delete();
        if(!empty($layanan)) {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Data jenis layanan berhasil dihapus</strong>')->error()->important();
            return redirect()->route('admin.layanan.index');
        } else {
            flash()->error('<i class="fa fa-info"></i>&nbsp; <strong>Data Tidak Ditemukan</strong>');
            return redirect()->route('admin.layanan.index');
        }
    }
}
