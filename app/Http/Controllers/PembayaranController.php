<?php

namespace App\Http\Controllers;

use App\Models\JenisLayanan;
use App\Models\Instansi;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePembayaranRequest;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    public function __construct (User $user, Role $role, Pembayaran $pembayaran)
    {
        $this->userRepo      = $user;
        $this->roleRepo      = $role;
        $this->pembayaranRepo   = $pembayaran;
    }

    public function index()
    {
        $user = Auth::user();
        $pembayaran = $this->pembayaranRepo->getAll();

        return view('backend.order.pembayaran.index')->with([
            'user' => $user,
            'pembayaran' => $pembayaran
        ]);
    }

    public function datatable() {



    }
}
