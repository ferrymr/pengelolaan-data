<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateReferralRequest;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use App\Models\Referral;
use App\Models\RoleView;
use App\Models\User;
use App\Models\Role;
use Exception;
use Symfony\Component\Console\Input\Input;

class ReferralController extends Controller
{
    public function __construct(
        User $user, 
        Role $role, 
        Referral $referral,
        RoleView $view
        )
    {
        $this->userRepo     = $user;
        $this->roleRepo     = $role;
        $this->referralRepo = $referral;
        $this->viewRepo     = $view;
    }

    public function index()
    {
        $user = Auth::user();
        $view = $this->viewRepo->getAll();
        
        return view('backend.master.referral.index')->with([
            'user' => $user,
            'view' => $view
        ]);
    }

    public function edit($no_member)
    {
        $user = Auth::user();
        $referral = $this->referralRepo->findId($no_member);
        $roles = $this->roleRepo->getAll();

        $upline = Referral::where('no_member', $referral->kode_up)->first();
        
        return view('backend.master.referral.edit')->with([
            'user' => $user,
            'upline' => $upline,
            'referral' => $referral,
            'roles' => $roles,
        ]);
    }

    public function datatable() 
    {
        $view = $this->viewRepo->getAll();

        return Datatables::of($view)
            ->editColumn('name', function($view) {
                return strtoupper($view->nama);
            })
            ->editColumn('daftar', function($view) {
                return date('d F Y', strtotime($view->daftar));
            })

            ->addColumn('action', function ($view){
                return [
                    'edit' => route('admin.referral.edit', $view->no_member),
                    // 'hapus' => route('admin.referral.delete', [$referral->no_member, $referral->kode_up]),
                ];
            })
            ->escapeColumns([])
            ->make(true);
    }

    public function update(CreateReferralRequest $request, $no_member)
    {
        try {
            $param = array(
                "kode_up" => $request->input('no_member'),
                "kode_dr" => $request->input('kode_up'),
            );
            
            $series = $this->referralRepo->editReferral($param, $no_member, $request->input('role_id'));

            // perlu tambahan koding, auto referral untuk member dibawahnya

            flash('<i class="fa fa-info"></i>&nbsp; <strong>Referral berhasil diupdate</strong>')->success()->important();
            return redirect()->route('admin.referral.index');
        } catch(\Exception $exception) {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Referral gagal diupdate</strong>')->error()->important();
            return redirect()->route('admin.referral.index');
        }
    }

    public function create()
    {
        $user = Auth::user();
        $referral = $this->referralRepo->getAll();
        $roles = $this->roleRepo->getAll();
        
        return view('backend.master.referral.create')->with([
            'user' => $user,
            'referral' => $referral,
            'roles' => $roles,
        ]);
    }

    public function store(CreateReferralRequest $request, $no_member)
    {
        // wait
    }

    public function leads(Request $request)
    {
        $no_member = $request->get('no_member');

        if ($request->ajax()) {
            $data = '';
            $qry = Referral::where('no_member', $no_member)->get();
            foreach ($qry as $value) {
                $data = array(
                    'nama' => $value->name,
                    'info_u' => $value->alamat,
                    'kode_up' => $value->kode_up,
                );
            }

            echo json_encode($data);
        }
    }

    public function down(Request $request)
    {
        $no_down = $request->get('no_down');

        if ($request->ajax()) {
            $data = '';
            $qry = Referral::where('no_member', $no_down)
                ->whereNull('kode_up')->whereNull('kode_dr')
                ->get();

            foreach ($qry as $value) {
                $data = array(
                    'namas' => $value->name,
                    'info_d' => $value->alamat,
                );
            }

            echo json_encode($data);
        }
    }
}
