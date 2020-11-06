<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateBarangRequest;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use App\Models\Barang;
use App\Models\BarangImages;
use App\Models\BarangRelated;
use App\Models\User;
use App\Models\Gallery;
use App\Models\Series;
use Illuminate\Http\Response;
use DB;
use File;

class BarangController extends Controller
{
    public function __construct (User $user, Barang $barang) 
    {
        $this->userRepo     = $user;
        $this->barangRepo   = $barang;
    }
    
    public function index()
    {
        $user = Auth::user();
        $barang = $this->barangRepo->getAll();

        return view('backend.master.barang.index')->with([
            'user' => $user,
            'barang' => $barang
        ]);
    }

    public function datatable() 
    {
        $barang = $this->barangRepo->getAll();

        return Datatables::of($barang)
            ->editColumn('image', function($barang) {
                if($barang->barangImages()->first()) {
                    return route('admin.barang.barang-image', $barang->barangImages()->first()->id);
                } else {
                    return '../img/no-image-barang.jpg';
                }
            })
            ->addColumn('action', function ($barang){
                return [
                    'edit' => route('admin.barang.edit', $barang->id),
                    'hapus' => route('admin.barang.delete', $barang->kode_barang),
                ];
            })
            ->escapeColumns([])
            ->make(true);
    }

    public function create()
    {
        $user = Auth::user();
        $barangs = Barang::where('unit', '!=', 'SERIES')->get();
        return view('backend.master.barang.create')->with([
            'user' => $user,
            'barangs' => $barangs,
        ]);
    }

    public function store(Request $request)
    {
        $input = $request->except(['_token']);
        $input['created_at'] = date("Y-m-d H:i:s");
        $input['update_at'] = date("Y-m-d H:i:s");
        $input['bpom'] = isset($input['bpom']) ? $input['bpom'] : 0;
        $input['cat'] = $input['bpom'];
        
        $jumlah = Barang::where('kode_barang', $input['kode_barang'])->count();

        if ($jumlah>0){
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Kode barang sudah ada</strong>')->error()->important();
            return redirect()->route('admin.barang.add');
        } else {
            // save template
            $barang = $this->barangRepo->addBarang($input);
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Data barang berhasil ditambah</strong>')->success()->important();
            return redirect()->route('admin.barang.edit', $barang->id);
        }        

    }    

    public function edit($id)
    {        
        $user = Auth::user();
        $barang = $this->barangRepo->findId($id);
        $barangImages = BarangImages::where('tb_barang_id', $id)->get();
        $barangRelated = BarangRelated::where('tb_barang_id', $id)->get();
        $products = Barang::where('unit', '!=', 'SERIES')->get();

        return view('backend.master.barang.edit')->with([
            'user' => $user,
            'barang' => $barang,
            'barangImages' => $barangImages,
            'barangRelated' => $barangRelated,
            'products' => $products,
            'barangs' => $barangs
        ]);
    }
    
    public function update(CreateBarangRequest $request, $kode_barang)
    {
        // password kosong
        $param = array(
            "kode_barang" => $request->input('kode_barang'),
            "nama" => $request->input('nama'),
            "jenis" => $request->input('jenis'),
            "stok" => $request->input('stok'),
            "poin" => $request->input('poin'),
            "diskon" => $request->input('diskon'),
            "bpom" => $request->input('bpom'),
            "berat" => $request->input('berat'),
            "satuan" => $request->input('satuan'),
            "h_nomem" => $request->input('h_nomem'),
            "h_member" => $request->input('h_member'),
            "deskripsi" => $request->input('deskripsi'),
            "cara_pakai" => $request->input('cara_pakai'),
            "flag_bestseller" => $request->input('flag_bestseller'),
            "stats" => $request->input('stats'),
            "flag_promo" => $request->input('flag_promo')
        );
    
        $barang = $this->barangRepo->editBarang($param, $kode_barang, $request->input('role_id'));

        if(!$this->barangRepo->error) {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Data barang berhasil diupdate</strong>')->success()->important();
            return redirect()->route('admin.barang.index');
        } else {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>User </strong> ' . $this->barangRepo->error)->error()->important();
            return redirect()->route('admin.barang.edit')->withInput()->withError();
        }
    }

    public function barangRelated(Request $request) {

        $id = $request->barang_id;

        foreach($request->input('barang_related') as $row) {
            if(!empty($row)) {
                $related[] = array(
                    'tb_barang_id' => $request->barang_id,
                    'tb_barang_related_id' => $row,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                );
            }            
        }

        $barang = $this->barangRepo->addBarangRelated($related, $id);

        if(!$this->barangRepo->error) {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Data barang berhasil diupdate</strong>')->success()->important();
            return redirect()->route('admin.barang.edit', $id);
        } else {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>User </strong> ' . $this->barangRepo->error)->error()->important();
            return redirect()->route('admin.barang.edit', $id)->withInput()->withError();
        }
    }
    
    public function destroy($kode_barang)
    {
        $barang = Barang::where('kode_barang', $kode_barang)->delete();
        if(!empty($barang)) {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Data Barang berhasil dihapus</strong>')->error()->important();
            return redirect()->route('admin.barang.index');
        } else {
            flash()->error('<i class="fa fa-info"></i>&nbsp; <strong>Data Barang Tidak Ditemukan</strong>');
            return redirect()->route('admin.barang.index');
        }
    }

    // ===================== BARANG IMAGE =========================

    public function storeBarangImage(Request $request)
    {
        
        if(!empty($request->file('nama_file'))) {
            $sort = 1;
            foreach ($request->file('nama_file') as $file) {
                $nama_file = 'barang-'.$sort.'-'. $request->input('barang_id') .'-' . date('YmdHis') . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('public/barang', $nama_file);

                $barang = $this->barangRepo->addbarangImage($request->input('barang_id'), $nama_file);
                $sort++;
            }
        }  else {
            $nama_file = "";
        }         

        if(!empty($nama_file)) {
            flash('<strong>Foto Barang Berhasil Ditambah</strong>')->success()->important();
            return redirect()->route('admin.barang.edit', $request->input('barang_id'));
        } else {
            flash('<strong>Foto Barang </strong> ' . $this->barangRepo->error)->error()->important();
            return redirect()->route('admin.barang.edit', $request->input('barang_id'))->withInput()->withError();
        }
    }

    public function getbarangImage($id) {
        $barangImage = BarangImages::find($id);
        
        if(!$barangImage) {
            abort(404); 
        }

        // Access local storage
        $path = storage_path('app/public/barang/' . $barangImage->nama_file);

        if (!File::exists($path)) {
            abort(404);
        }

        // Return file
        return (new Response(File::get($path), 200))
              ->header('Content-Type', File::mimeType($path));
    }

    public function deletebarangImage($barangId, $id) {
        $data = BarangImages::find($id);
        if(!empty($data)) {
            BarangImages::where('id', $id)->delete();

            // unlink image
            if(file_exists(base_path(). '/storage/app/public/barang/'. $data->nama_file)) {
                unlink(base_path(). '/storage/app/public/barang/'. $data->nama_file);
            }

            $result = true;
        } else {
            $result = false;
        }

        if($result) {
            flash('<strong>Foto Barang Berhasil Dihapus</strong>')->success()->important();
            return redirect()->route('admin.barang.edit', $barangId);
        } else {
            flash('<strong>Foto Barang Gagal Dihapus</strong> ')->error()->important();
            return redirect()->route('admin.barang.edit', $barangId)->withInput()->withError();
        }
    }
    
    public function create_kode(Request $request)
    {
        $kode_pack = $request->get('kode_pack');

        if($request->ajax()) {
            $data = '';
            $qry = Series::where('kode_pack', $kode_pack)->get();
            foreach ($qry as $value) {
                $data = array(
                    'nama'  =>  $value->nama_pack,
                    'jenis'  =>  $value->jenis_pack,
                    'h_nomem'  =>  $value->h_nomem,
                    'h_member'  =>  $value->h_member,
                    'berat'  =>  $value->berat,
                );
            }
            echo json_encode($data);
        }
    
    }

    
}
