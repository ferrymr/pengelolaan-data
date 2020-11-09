<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use App\Http\Requests\CreateBankRequest;
use App\Models\Bank;
use App\Models\User;
use App\Models\Role;

class BankController extends Controller
{
    public function __construct(User $user, Role $role, Bank $bank)
    {
        $this->userRepo     = $user;
        $this->roleRepo     = $role;
        $this->bankRepo     = $bank;
    }

    public function index()
    {
        $user = Auth::user();
        $banks = $this->bankRepo->getAll();

        return view('backend.master.bank.index')->with([
            'user' => $user,
            'banks' => $banks,
        ]);
    }

    public function datatable()
    {

        $banks = $this->bankRepo->getAll();

        return Datatables::of($banks)
            ->addColumn('action', function ($bank) {
                return [
                    'edit' => route('admin.bank.edit', $bank->id),
                    'hapus' => route('admin.bank.delete', $bank->id),
                ];
            })
            ->escapeColumns([])
            ->make(true);
    }

    public function create()
    {
        $user = Auth::user();
        $roles = $this->bankRepo->getAll();

        return view('backend.master.bank.create')->with([
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    public function store(CreateBankRequest $request)
    {
        $bank = $this->bankRepo->addBank($request->all());

        if (!$this->bankRepo->error) {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Bank Berhasil Ditambah</strong>')->success();
            return redirect()->route('admin.bank.index');
        } else {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Bank </strong> ' . $this->bankRepo->error)->error()->important();
            return redirect()->route('admin.bank.add')->withInput()->withError();
        }
    }

    public function edit($id)
    {
        $user = Auth::user();
        $currentBank = $this->bankRepo->findOrFail($id);
        $roles = $this->roleRepo->getAll();

        return view('backend.master.bank.edit')->with([
            'user' => $user,
            'currentBank' => $currentBank,
            'roles' => $roles,
        ]);
    }

    public function update(CreateBankRequest $request, $id)
    {
        // dd($request->all());

        // password kosong
        $param = array(
            "bank_name" => $request->input('bank_name'),
            "bank_account" => $request->input('bank_account'),
            "description" => $request->input('description'),
        );

        $Bank = $this->bankRepo->editBank($param, $id, $request->input('role_id'));

        if (!$this->bankRepo->error) {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Bank berhasil diupdate</strong>')->success();
            return redirect()->route('admin.bank.index');
        } else {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Bank </strong> ' . $this->bankRepo->error)->error()->important();
            return redirect()->route('admin.bank.edit')->withInput()->withError();
        }
    }

    public function destroy($id)
    {
        $data = $this->bankRepo->deleteBank($id);
        if (!empty($data)) {
            flash()->success('<i class="fa fa-info"></i>&nbsp; <strong>Bank berhasil dihapus</strong>');
            return redirect()->route('admin.bank.index');
        } else {
            flash()->success('<i class="fa fa-info"></i>&nbsp; <strong>Bank Tidak Ditemukan</strong>');
            return redirect()->route('admin.bank.index');
        }
    }
}
