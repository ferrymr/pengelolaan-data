<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Instansi;
use App\Models\Pembayaran;
use App\Models\JenisLayanan;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;


class PembayaranController extends Controller
{
    public function __construct (User $user, Role $role, Pembayaran $pembayaran, JenisLayanan $layanan, Instansi $instansi)
    {
        $this->userRepo      = $user;
        $this->roleRepo      = $role;
        $this->pembayaranRepo   = $pembayaran;
        $this->layananRepo      = $layanan;
        $this->instansiRepo      = $instansi;
    }

    public function index()
    {
        $user = Auth::user();
        $instansi = Instansi::all();
        $layanan = JenisLayanan::all();
        // $data = $this->pembayaranRepo->getAll();

        return view('backend.order.pembayaran.index', compact('instansi','layanan','user'));
    }

    public function datatable() 
    {
        $data = Pembayaran::select('pembayaran.*', 'no_pelanggan','nama_instansi','jenis_layanan')
            ->leftJoin('m_instansi', 'm_instansi.id', 'pembayaran.id_instansi')
            ->leftJoin('m_jenis_layanan', 'm_jenis_layanan.id', 'pembayaran.id_jenis_layanan')
            ->orderBy('id', 'asc')
            ->get();
        
        return Datatables::of($data)
            ->addColumn('photo', function ($data) {
                $url= asset($data->photo);
                return '<img src="'.$url.'" border="0" width="100" class="img-rounded" align="center" />';
            })
            // ->addColumn('status', function($data) {
            //     if(!empty($data->status)) {
            //         if($data->status == "Lunas" ||
            //             $data->status == "Belum Lunas"
            //         ) { 
            //             return '<span class="badge bg-warning">Not confirm yet</span>';
            //         } else {
            //             return '<span class="badge bg-success">Confirmed</span>';
            //         }
            //     }
            // })
            ->addColumn('action', function ($data) {
                return [
                    'edit'  => route('admin.pembayaran.edit', $data->id),
                    'hapus' => route('admin.pembayaran.delete', $data->id),
                ];
            })
            ->escapeColumns([])
            ->make(true);
    }

    public function create()
    {
        $user = Auth::user();
        $roles = $this->roleRepo->getAll();
        $layanan = JenisLayanan::all();
        $instansi = Instansi::all();

        return view('backend.order.pembayaran.create')->with([
            'user' => $user,
            'roles' => $roles,
            'layanan' => $layanan,
            'instansi' => $instansi
        ]);
    }

    public function getNama(Request $request)
    {
        $no_pelanggan = $request->get('no_pelanggan');

        $data = Instansi::select('nama_instansi')->where('no_pelanggan', $no_pelanggan)->firstOrFail();

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'id_instansi' => 'required',
            'id_jenis_layanan' => 'required',
            'tgl_pembayaran' => 'required',
            'nominal_pembayaran' => 'required',
            'total_mbps' => 'required',
            'status' => 'required',
            'photo' => 'image|file|max:1024'
        ]);

        if($request->file('photo')) {
                $validateData['photo'] = $request->file('photo')->store(
                    'assets/product', 'public');
            }

        Pembayaran::create($validateData);

        return redirect()->route('admin.pembayaran.index');        
    }

    public function edit($id)
    {
        $user = Auth::user();
        $currentPembayaran = $this->pembayaranRepo->findId($id);
        $roles = $this->roleRepo->getAll();
        $instansi = $this->instansiRepo->getAll();
        $layanan = $this->layananRepo->getAll();

        return view('backend.order.pembayaran.edit')->with([
            'user' => $user,
            'currentPembayaran' => $currentPembayaran,
            'roles' => $roles,
            'instansi' => $instansi,
            'layanan'   => $layanan
        ]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'id_instansi' => 'required',
            'id_jenis_layanan' => 'required',
            'tgl_pembayaran' => 'required',
            'nominal_pembayaran' => 'required',
            'total_mbps' => 'required',
            'status' => 'required',
            'photo' => 'image|file|max:1024'
        ];

        $validateData = $request->validate($rules);

        if($request->file('photo')) {
            $validateData['photo'] = $request->file('photo')->store(
                'assets/product', 'public');
        }

        Pembayaran::find($id)->update($validateData);

        return redirect()->route('admin.pembayaran.index'); 
    }

    public function destroy($id)
    {
        $pembayaran = Pembayaran::where('id', $id)->delete();
        if(!empty($pembayaran)) {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Data pembayaran berhasil dihapus</strong>')->error()->important();
            return redirect()->route('admin.pembayaran.index');
        } else {
            flash()->error('<i class="fa fa-info"></i>&nbsp; <strong>Data Tidak Ditemukan</strong>');
            return redirect()->route('admin.pembayaran.index');
        }
    }
}
