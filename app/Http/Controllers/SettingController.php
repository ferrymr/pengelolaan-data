<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use App\Http\Requests\CreateSettingRequest;
use App\Models\Setting;
use App\Models\User;
use App\Models\Role;

class SettingController extends Controller
{
    public function __construct(User $user, Role $role, Setting $setting)
    {
        $this->userRepo     = $user;
        $this->roleRepo     = $role;
        $this->settingRepo  = $setting;
    }

    public function index()
    {
        $user     = Auth::user();
        $settings = $this->settingRepo->getAll();

        return view('backend.master.setting.index')->with([
            'user'     => $user,
            'settings' => $settings,
        ]);
    }

    public function datatable()
    {

        $settings = $this->settingRepo->getAll();

        return Datatables::of($settings)
            ->addColumn('action', function ($setting) {
                return [
                    'edit' => route('admin.setting.edit', $setting->id),
                    'hapus' => route('admin.setting.delete', $setting->id),
                ];
            })
            ->escapeColumns([])
            ->make(true);
    }

    public function create()
    {
        $user = Auth::user();
        $roles = $this->settingRepo->getAll();

        return view('backend.master.setting.create')->with([
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    public function store(CreateSettingRequest $request)
    {
        $setting = $this->settingRepo->addSetting($request->all());

        if (!$this->settingRepo->error) {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Setting Berhasil Ditambah</strong>')->success();
            return redirect()->route('admin.setting.index');
        } else {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Setting </strong> ' . $this->settingRepo->error)->error()->important();
            return redirect()->route('admin.setting.add')->withInput()->withError();
        }
    }

    public function edit($id)
    {
        $user = Auth::user();
        $currentSetting = $this->settingRepo->findOrFail($id);
        $roles = $this->roleRepo->getAll();

        return view('backend.master.setting.edit')->with([
            'user' => $user,
            'currentSetting' => $currentSetting,
            'roles' => $roles,
        ]);
    }

    public function update(CreateSettingRequest $request, $id)
    {
        $param = array(
            "name"        => $request->input('name'),
            "slug"        => $request->input('slug'),
            "category"    => $request->input('category'),
            "description" => $request->input('description'),
        );

        $Setting = $this->settingRepo->editSetting($param, $id, $request->input('role_id'));

        if (!$this->settingRepo->error) {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Setting berhasil diupdate</strong>')->success();
            return redirect()->route('admin.setting.index');
        } else {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Setting </strong> ' . $this->settingRepo->error)->error()->important();
            return redirect()->route('admin.setting.edit')->withInput()->withError();
        }
    }

    public function destroy($id)
    {
        $data = $this->settingRepo->deleteSetting($id);
        if (!empty($data)) {
            flash()->success('<i class="fa fa-info"></i>&nbsp; <strong>Setting berhasil dihapus</strong>');
            return redirect()->route('admin.setting.index');
        } else {
            flash()->success('<i class="fa fa-info"></i>&nbsp; <strong>Setting Tidak Ditemukan</strong>');
            return redirect()->route('admin.setting.index');
        }
    }
}
