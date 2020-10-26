<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateSeriesRequest;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use App\Models\Referral;
use App\Models\User;
use App\Models\Role;
use Exception;
use Symfony\Component\Console\Input\Input;

class ReferralController extends Controller
{
    public function __construct(User $user, Role $role, Referral $referral)
    {
        $this->userRepo     = $user;
        $this->roleRepo     = $role;
        $this->referralRepo = $referral;
    }

    public function index()
    {
        $user = Auth::user();
        $referral = $this->referralRepo->getAll();
        
        return view('backend.master.referral.index')->with([
            'user' => $user,
            'referral' => $referral
        ]);

        return $referral;
    }

    public function datatable() 
    {
        $referral = $this->referralRepo->where('tipe','!=','A')->get();

        return Datatables::of($referral)
            ->editColumn('daftar', function($referral) {
                return date('d F Y', strtotime($referral->daftar));
            })

            ->addColumn('action', function ($referral){
                return [
                    'edit' => route('admin.referral.edit', $referral->no_member),
                    'hapus' => route('admin.referral.delete', $referral->no_member),
                ];
            })
            ->escapeColumns([])
            ->make(true);
    }
}
