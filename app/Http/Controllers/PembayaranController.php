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
        // $pembayaran = $this->pembayaranRepo->getAll();

        // $data = Pembayaran::with('instansi','layanan')->get();

        // return view('backend.order.pembayaran.index')->with([
        //     'user' => $user,
        //     // 'pembayaran' => $pembayaran
        //     'data' => $data
        // ]);

        $instansi = Instansi::all();
        $layanan = JenisLayanan::all();

        return view('backend.order.pembayaran.index', compact('instansi','layanan','user'));
    }

    public function datatable() 
    {
        // $data = Pembayaran::with('instansi','layanan')->get();
        $data = Pembayaran::select('pembayaran.*', 'no_pelanggan','nama_instansi','jenis_layanan')
            ->leftJoin('m_instansi', 'm_instansi.id', 'pembayaran.id_instansi')
            ->leftJoin('m_jenis_layanan', 'm_jenis_layanan.id', 'pembayaran.id_jenis_layanan')
            ->orderBy('id', 'asc')
            ->get();
        
        return Datatables::of($data)

            ->addColumn('action', function ($data) {
                return [
                    'edit'  => route('admin.pembayaran.edit', $data->id),
                    'hapus' => route('admin.pembayaran.delete', $data->id),
                ];
            })
            ->escapeColumns([])
            ->make(true);
    }
}
