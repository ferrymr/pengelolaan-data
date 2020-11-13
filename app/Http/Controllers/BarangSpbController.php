<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateBarangSpbRequest;
use App\Models\Barang;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use App\Models\User;
use App\Models\BarangSpb;
use App\Models\TbDetSeries;
use App\Models\Series;

class BarangSpbController extends Controller
{
    public function __construct (User $user, BarangSpb $barangspb, TbDetSeries $detail, Barang $barang) 
    {
        $this->userRepo     = $user;
        $this->barangspbRepo   = $barangspb;
        $this->detailRepo = $detail;
        $this->barangRepo = $barang;
    }

    public function index(Request $request)
    {
        $user = Auth::user();
        $barangspb = $this->barangspbRepo->getAll();

        return view('backend.tools.spb.index')->with([
            'user' => $user,
            'barangspb' => $barangspb,
        ]);
        
    }

    public function datatable(Request $request) 
    {
        $barangspb = $this->barangspbRepo->getAll();
        if(request()->ajax())
        {
            if(!empty($request->id_spb))
            {
                $barangspb = BarangSpb::
                        select('id', 'no_member', 'kode_barang', 'nama', 'jenis',
                        'stok', 'poin')
                        ->where('no_member', $request->id_spb)
                        ->get();
            } else {
                $barangspb = BarangSpb::
                        select('id', 'no_member', 'kode_barang', 'nama', 'jenis',
                        'stok', 'poin')
                        ->get();
            }
        }

        return Datatables::of($barangspb)
            ->addColumn('action', function ($barangspb){
                return [
                    'view' => route('admin.barangspb.view', $barangspb->id),
                    'hapus' => route('admin.barangspb.delete', $barangspb->id),
                ];
            })
            ->escapeColumns([])
            ->make(true);
    }

    public function view($id)
    {        
        $user = Auth::user();
        $barangspb = $this->barangspbRepo->findId($id);
        $komposisi = TbDetSeries::where('tb_series_id', $id)->get();

        return view('backend.tools.spb.view')->with([
            'user' => $user,
            'barangspb' => $barangspb,
            'komposisi' =>$komposisi,
        ]);
        
        
    }

    public function update(CreateBarangSpbRequest $request, $kode_barang)
    {
        // password kosong
        $param = array(
            "kode_barang" => $request->input('kode_barang'),
            "nama"        => $request->input('nama'),
            "jenis"       => $request->input('jenis'),
            "stok"        => $request->input('stok'),
            "poin"        => $request->input('poin'),
            "berat"       => $request->input('berat'),
            "satuan"      => $request->input('satuan'),
            "h_nomem"     => $request->input('h_nomem'),
            "h_member"    => $request->input('h_member'),
            "deskripsi"   => $request->input('deskripsi'),
            "cara_pakai"  => $request->input('cara_pakai')
        );
    
        $barangspb = $this->barangspbRepo->editBarang($param, $kode_barang, $request->input('role_id'));

        if(!$this->barangspbRepo->error) {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Data barang berhasil diupdate</strong>')->success()->important();
            return redirect()->route('admin.barangspb.index');
        } else {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>User </strong> ' . $this->barangspbRepo->error)->error()->important();
            return redirect()->route('admin.barangspb.edit')->withInput()->withError();
        }
    }

    public function destroy($id)
    {
        $barangspb = BarangSpb::where('id', $id)->delete();
        if(!empty($barangspb)) {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Data Barang berhasil dihapus</strong>')->error()->important();
            return redirect()->route('admin.barangspb.index');
        } else {
            flash()->error('<i class="fa fa-info"></i>&nbsp; <strong>Data Barang Tidak Ditemukan</strong>');
            return redirect()->route('admin.barangspb.index');
        }
    }

    
}
