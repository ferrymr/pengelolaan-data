<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use App\Models\KonfirmasiDaftar;
use App\Models\DaftarMember;
use App\Models\Role;
use App\Models\User;
use DB;
use File;
use Illuminate\Http\Response;

class KonfirmasiDaftarController extends Controller
{
    public function __construct (
        KonfirmasiDaftar $konfirmasiDaftar
    ) {
        $this->konfirmasiDaftarRepo = $konfirmasiDaftar;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $konfirmasiDaftar = $this->konfirmasiDaftarRepo->getAll();
        // dd($konfirmasiDaftar);
        return view('backend.store.konfirmasi-daftar.index')->with([
            'user' => $user,
            'konfirmasiDaftar' => $konfirmasiDaftar,
        ]);
    }

    public function datatable() {
        $konfirmasiDaftar = $this->konfirmasiDaftarRepo->getAll();
        return Datatables::of($konfirmasiDaftar)     
            ->editColumn('filename', function($konfirmasiDaftar) {
                if(!empty($konfirmasiDaftar->filename)) {
                    return route('admin.konfirmasi-daftar.konfirmasi-daftar-image', $konfirmasiDaftar->id);
                } else {
                    return '../../img/no-image-product.jpg';
                }
            })
            ->addColumn('status', function($konfirmasiDaftar) {
                if(!empty($konfirmasiDaftar->transaction)) {
                    if($konfirmasiDaftar->transaction->status == 0
                    ) { 
                        return '<span class="badge bg-warning">Not confirm yet</span>';
                    } else {
                        return '<span class="badge bg-success">Confirmed</span>';
                    }
                }
            })
            ->addColumn('no_doo', function($konfirmasiDaftar) {
                if(!empty($konfirmasiDaftar->transaction)) {
                    if(isset($konfirmasiDaftar->transaction->tbHeadJual)) { 
                        return $konfirmasiDaftar->transaction->tbHeadJual->no_do;
                    } else {
                        return '-';
                    }
                }
            })
            ->addColumn('action', function ($konfirmasiDaftar){
                return [
                    'edit'      => route('admin.konfirmasi-daftar.edit', [$konfirmasiDaftar->transaction->id, $konfirmasiDaftar->transaction->jenis]),
                    'cancel'      => route('admin.konfirmasi-daftar.cancel', [$konfirmasiDaftar->transaction->id, $konfirmasiDaftar->transaction->jenis]),
                ];
            })
            ->escapeColumns([])
            ->make(true);
    }

    public function edit($id, $jenis) {
        $konfirm = DaftarMember::where('id', $id);

        // update status
        $update = $konfirm->update(['status' => 1]);

        // asign user to reseller / member
        $assign = Role::where('name', $jenis)->first();
        $detach = Role::where('name', 'user')->first();
        $detachMember = Role::where('name', 'member')->first();
        
        $user = User::find($konfirm->first()->user_id);

        if($user->hasRole('member') && $jenis == 'reseller') {
            $user->detachRole($detachMember);
        } else {
            $user->detachRole($detach);
        }
        $user->attachRole($assign);

        flash('<i class="fa fa-info"></i>&nbsp; <strong>Transaksi berhasil di confirm</strong>')->success()->important();
        return redirect()->route('admin.konfirmasi-daftar.index');
    }

    public function cancel($id) {
        $konfirm = DaftarMember::where('id', $id)->update(['status' => "TRANSFERRED"]);
        flash('<i class="fa fa-info"></i>&nbsp; <strong>Konfirmasi berhasil dibatalkan</strong>')->success()->important();
        return redirect()->route('admin.konfirmasi-daftar.index');
    }

    public function getKonfirmasiDaftarImage($id) {
        $konfirmasiDaftarImage = $this->konfirmasiDaftarRepo->find($id);
        if(!$konfirmasiDaftarImage) {
            abort(404); 
        }

        // Access local storage
        $path = storage_path('app/public/konfirmasi_pendaftaran/' . $konfirmasiDaftarImage->filename);

        if (!File::exists($path)) {
            abort(404);
        }

        // Return file
        return (new Response(File::get($path), 200))
              ->header('Content-Type', File::mimeType($path));
    }
}
