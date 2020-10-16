<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateSeriesRequest;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use App\Models\Series;
use App\Models\SeriesDetail;
use App\Models\Barang;
use App\Models\User;
use App\Models\Role;
use Exception;
use Symfony\Component\Console\Input\Input;

class SeriesController extends Controller
{
    public function __construct (User $user, Role $role, Series $series, SeriesDetail $detail, Barang $barang) 
    {
        $this->userRepo     = $user;
        $this->roleRepo     = $role;
        $this->seriesRepo   = $series;
        $this->detailRepo   = $detail;
        $this->barangRepo   = $barang;
    }
    
    public function index()
    {
        $user = Auth::user();
        $series = $this->seriesRepo->getAll();

        return view('backend.master.series.index')->with([
            'user' => $user,
            'series' => $series
        ]);

        return $series;
    }

    public function datatable() 
    {
        $series = $this->seriesRepo->getAll();

        return Datatables::of($series)
            ->addColumn('action', function ($series){
                return [
                    'edit' => route('admin.series.edit', $series->kode_pack),
                    'hapus' => route('admin.series.delete', $series->kode_pack),
                ];
            })
            ->escapeColumns([])
            ->make(true);
    }

    public function create()
    {
        $user = Auth::user();
        $barang = $this->barangRepo->getAll();
        $roles = $this->roleRepo->getAll();
        
        return view('backend.master.series.create')->with([
            'user' => $user,
            'barang' => $barang,
            'roles' => $roles,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        try {
            $item = count($request->kode_barang);

            if($item > 0) {
                $series = Series::create($data);

                // perlu pindah ke model ?
                foreach($request->kode_barang as $key=>$kode_barang)
                {
                    $detail = array(
                        'kode_pack' => $request->kode_pack,
                        'kode_barang' => $request->kode_barang[$key],
                        'nama' => $request->nama[$key],
                        'jumlah' => $request->jumlah[$key],
                    );

                    SeriesDetail::insert($detail);
                }

                flash('<i class="fa fa-info"></i>&nbsp; <strong>Series berhasil ditambah</strong>')->success();
                return redirect()->route('admin.series.index');
            } else {
                flash('<i class="fa fa-info"></i>&nbsp; <strong>Tambah data series gagal</strong>')->error()->important();
                return redirect()->route('admin.series.add')->withInput()->withError();
            }
        } catch(\Exception $exception) {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Series gagal ditambah</strong>')->error()->important();
            return redirect()->route('admin.series.index');
        }
    }

    public function show($kode_pack)
    {
        // wait.....
    }

    public function edit($kode_pack)
    {
        $user = Auth::user();
        $series = $this->seriesRepo->findId($kode_pack);
        $detail = $this->detailRepo->findId($kode_pack);
        $barang = $this->barangRepo->getAll();
        $roles = $this->roleRepo->getAll();

        return view('backend.master.series.edit')->with([
            'user' => $user,
            'series' => $series,
            'detail' => $detail,
            'barang' => $barang,
            'roles' => $roles,
        ]);
    }
    
    public function update(CreateSeriesRequest $request, $kode_pack)
    {
        try {
            $item = count($request->kode_barang);

            if($item > 0) {
                $param = array(
                    "nama_pack" => $request->input('nama_pack'),
                    "jenis_pack" => $request->input('jenis_pack'),
                    "h_member" => $request->input('h_member'),
                    "poin" => $request->input('poin'),
                    "h_nomem" => $request->input('h_nomem'),
                );
            
                $series = $this->seriesRepo->editSeries($param, $kode_pack, $request->input('role_id'));
                $detail = $this->detailRepo->deleteSeries($kode_pack);

                // perlu pindah ke model ?
                foreach($request->kode_barang as $key=>$kode_barang)
                {
                    $detail = array(
                        'kode_pack' => $request->kode_pack,
                        'kode_barang' => $request->kode_barang[$key],
                        'nama' => $request->nama[$key],
                        'jumlah' => $request->jumlah[$key],
                    );

                    SeriesDetail::insert($detail);
                }

                flash('<i class="fa fa-info"></i>&nbsp; <strong>Series berhasil diupdate</strong>')->success();
                return redirect()->route('admin.series.index');
            } else {
                flash('<i class="fa fa-info"></i>&nbsp; <strong>Update data series gagal</strong>')->error()->important();
                return redirect()->route('admin.series.edit')->withInput()->withError();
            }
        } catch(\Exception $exception) {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Series gagal diupdate</strong>')->error()->important();
            return redirect()->route('admin.series.index');
        }
    }
    
    public function destroy($kode_pack)
    {
        $data = $this->seriesRepo->deleteSeries($kode_pack);
        
        if(!empty($data)) {
            $item = $this->detailRepo->deleteSeries($kode_pack);

            if(!empty($item)) {
                flash('<i class="fa fa-info"></i>&nbsp; <strong>Series berhasil dihapus</strong>')->success();
                return redirect()->route('admin.series.index');
            } else {
                flash('<i class="fa fa-info"></i>&nbsp; <strong>Komposisi series tidak ditemukan</strong>')->success();
                return redirect()->route('admin.series.index');
            }
        } else {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Series tidak ditemukan</strong>')->error()->important();
            return redirect()->route('admin.series.index');
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
                );
            }
            echo json_encode($data);
        }
    }
}
