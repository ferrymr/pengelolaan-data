<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateAdjusmentRequest;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use App\Models\Adjusment;
use App\Models\AdjusmentDetail;
use App\Models\RoleView;
use App\Models\Barang;
use App\Models\User;
use App\Models\Role;
use Exception;
use Symfony\Component\Console\Input\Input;

class AdjusmentController extends Controller
{
    public function __construct (
        User $user, 
        Role $role, 
        Adjusment $adjust, 
        AdjusmentDetail $detail, 
        RoleView $stokis, 
        Barang $barang
        ) 
    {
        $this->userRepo     = $user;
        $this->roleRepo     = $role;
        $this->adjustRepo   = $adjust;
        $this->detailRepo   = $detail;
        $this->barangRepo   = $barang;
        $this->stokisRepo   = $stokis;
    }
    
    public function index()
    {
        $user = Auth::user();
        $adjust = $this->adjustRepo->getAll();

        return view('backend.tools.adjusment.index')->with([
            'user' => $user,
            'adjust' => $adjust
        ]);

        return $adjust;
    }

    public function datatable() 
    {
        $adjust = $this->adjustRepo->getAll();

        return Datatables::of($adjust)
            ->addColumn('action', function ($adjust){
                return [
                    'edit' => route('admin.adjusment.edit', $adjust->no_so),
                    'hapus' => route('admin.adjusment.delete', $adjust->no_so),
                ];
            })
            ->escapeColumns([])
            ->make(true);
    }

    public function create()
    {
        $user = Auth::user();
        $barang = $this->barangRepo->getAll();
        $code = $this->adjustRepo->autoCode();
        $stokis = $this->stokisRepo->getStokis();
        $roles = $this->roleRepo->getAll();

        if (!empty($code)) {
            $newCode = date('Y') . '/SO/' . str_pad(substr($code->no_so, -4) + 1, 4, '0', STR_PAD_LEFT);
        } else {
            $newCode = date('Y') . '/SO/0001';
        }
        
        return view('backend.tools.adjusment.create')->with([
            'user' => $user,
            'barang' => $barang,
            'newCode' => $newCode,
            'stokis' => $stokis,
            'roles' => $roles,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        try {
            $item = count($request->no_so);

            if($item > 0) {
                $adjust = Adjusment::create($data);

                // perlu pindah ke model ?
                foreach($request->kode_barang as $key=>$kode_barang)
                {
                    $detail = array(
                        'no_so' => $request->no_so,
                        'kode_barang' => $request->kode_barang[$key],
                        'nama' => $request->nama[$key],
                        'stok' => $request->stok[$key],
                        'jumlah' => $request->jumlah[$key],
                    );

                    AdjusmentDetail::insert($detail);
                }

                flash('<i class="fa fa-info"></i>&nbsp; <strong>Adjusment berhasil ditambah</strong>')->success()->important();
                return redirect()->route('admin.adjusment.index');
            } else {
                flash('<i class="fa fa-info"></i>&nbsp; <strong>Tambah data adjusment gagal</strong>')->error()->important();
                return redirect()->route('admin.adjusment.add')->withInput()->withError();
            }
        } catch(\Exception $exception) {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Adjusment gagal ditambah</strong>')->error()->important();
            return redirect()->route('admin.adjusment.index');
        }
    }

    public function show($no_so)
    {
        // wait.....
    }

    public function edit($no_so)
    {
        $user = Auth::user();
        $adjust = $this->adjustRepo->findId($no_so);
        $detail = $this->detailRepo->findId($no_so);
        $barang = $this->barangRepo->getAll();
        $roles = $this->roleRepo->getAll();

        return view('backend.tools.adjusment.edit')->with([
            'user' => $user,
            'adjust' => $adjust,
            'detail' => $detail,
            'barang' => $barang,
            'roles' => $roles,
        ]);
    }
    
    public function update(CreateAdjusmentRequest $request, $no_so)
    {
        try {
            $item = count($request->no_so);

            if($item > 0) {
                $param = array(
                    "no_so" => $request->input('no_so'),
                    "kasir" => $request->input('kasir'),
                    "note" => $request->input('note'),
                    "pos" => $request->input('pos'),
                );
            
                $adjust = $this->adjustRepo->editAdjusment($param, $no_so, $request->input('role_id'));
                $detail = $this->detailRepo->deleteAdjusment($no_so);

                // perlu pindah ke model ?
                foreach($request->kode_barang as $key=>$kode_barang)
                {
                    $detail = array(
                        'no_so' => $request->no_so,
                        'kode_barang' => $request->kode_barang[$key],
                        'nama' => $request->nama[$key],
                        'stok' => $request->stok[$key],
                        'jumlah' => $request->jumlah[$key],
                    );

                    AdjusmentDetail::insert($detail);
                }

                flash('<i class="fa fa-info"></i>&nbsp; <strong>Adjusment berhasil diupdate</strong>')->success()->important();
                return redirect()->route('admin.adjusment.index');
            } else {
                flash('<i class="fa fa-info"></i>&nbsp; <strong>Update data adjusment gagal</strong>')->error()->important();
                return redirect()->route('admin.adjusment.edit')->withInput()->withError();
            }
        } catch(\Exception $exception) {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Adjusment gagal diupdate</strong>')->error()->important();
            return redirect()->route('admin.adjusment.index');
        }
    }
    
    public function destroy($no_so)
    {
        $data = $this->adjustRepo->deleteAdjusment($no_so);
        
        if(!empty($data)) {
            $item = $this->detailRepo->deleteAdjusment($no_so);

            if(!empty($item)) {
                flash('<i class="fa fa-info"></i>&nbsp; <strong>Adjusment berhasil dihapus</strong>')->success()->important();
                return redirect()->route('admin.adjusment.index');
            } else {
                flash('<i class="fa fa-info"></i>&nbsp; <strong>Data adjusment tidak ditemukan</strong>')->success()->important();
                return redirect()->route('admin.adjusment.index');
            }
        } else {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Adjusment tidak ditemukan</strong>')->error()->important()->important();
            return redirect()->route('admin.adjusment.index');
        }
    }

    public function komposisi(Request $request)
    {
        $kode_barang = $request->get('kode_barang');

        if($request->ajax()) {
            $data = '';
            $qry = Barang::where('kode_barang', $kode_barang)->get();
            foreach ($qry as $value) {
                $data = array(
                    'nama'  =>  $value->nama,
                    'stok'  =>  $value->stok,
                );
            }
            echo json_encode($data);
        }
    }
}
