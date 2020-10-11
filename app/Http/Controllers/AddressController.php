<?php

namespace App\Http\Controllers;

use App\Models\ShippingAddress;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\User;
use Illuminate\Http\Request;
// use DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
// use Kavist\RajaOngkir\Facades\RajaOngkir;
use App\Http\Resources\ProvinceResource;
use App\Http\Resources\CityResource;
use App\Http\Resources\SubdistrictResource;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = auth()->user()->id;
        
        $shippings = ShippingAddress::where('user_id', $userId)->get();

        return view('address-list', compact('shippings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $daftarProvinsi  = $this->getProvinces();
        return view('address-form', compact('daftarProvinsi'));        
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $provinsiId     = $request->provinsi;
        $kotaId         = $request->kota;
        $kecamatanId    = $request->kecamatan;

        $provinsi   = Provinsi::select('province_id','name')->where('province_id',$provinsiId)->first();
        $kota       = Kota::select('city_id','name')->where('city_id',$kotaId)->first();
        $kecamatan  = Kecamatan::select('subdistrict_id','name')->where('subdistrict_id',$kecamatanId)->first();
        // dd($kecamatan->name);

        $userId = auth()->user()->id;

        $this->validate($request, [
            'nama' => 'required|string',
            'telepon' => 'required|numeric',
            'provinsi' => 'required|numeric',
            'kota' => 'required|numeric',
            'kecamatan' => 'required|numeric',
            'alamat' => 'required|string',
            'kode_pos' => 'numeric'
        ]);
            
        try {
            $newShippingAddress = ShippingAddress::create([
                'user_id' => $userId,
                'nama' => $request->nama,
                'telepon' => $request->telepon,
                'provinsi_id' => $provinsi->province_id,
                'provinsi_nama' => $provinsi->name,
                'kota_id' => $kota->city_id,
                'kota_nama' => $kota->name,
                'kecamatan_id' => $kecamatan->subdistrict_id,
                'kecamatan_nama' => $kecamatan->name,
                'alamat' => $request->alamat,
                'kode_pos' => $request->kode_pos
            ]);

            return redirect(route('address.index'))->with(['success' => 'Alamat pengiriman berhasil ditambahkan']);
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shipping = ShippingAddress::find($id);

        // $daftarProvinsi  = RajaOngkir::provinsi()->all();
        // $daftarKota      = RajaOngkir::kota()->dariProvinsi($shipping->provinsi_id)->get();
        // $daftarKecamatan = RajaOngkir::kecamatan()->dariKota($shipping->kota_id)->get();

        $daftarProvinsi     = Provinsi::all();
        $daftarKota         = Kota::where('province_id', $shipping->provinsi_id)->get();
        $daftarKecamatan    = Kecamatan::where('city_id', $shipping->kota_id)->get();

        return view('address-edit', compact('shipping', 'daftarProvinsi','daftarKota','daftarKecamatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $namaProvinsi   = Provinsi::select('name')->where('province_id',$request->provinsi)->first()['name'];
        $namaKota       = Kota::select('name')->where('city_id',$request->kota)->first()['name'];
        $namaKecamatan  = Kecamatan::select('name')->where('subdistrict_id',$request->kecamatan)->first()['name'];

        // $daftarProvinsi     = Provinsi::all();

        // $shippings->nama            = $request->nama;
        // $shippings->telepon         = $request->telepon;
        // $shippings->provinsi_id     = $request->provinsi_id;
        // $shippings->provinsi_nama   = $request->provinsi_nama;
        // $shippings->kota_id         = $request->kota_id;
        // $shippings->kota_nama       = $request->kota_nama;
        // $shippings->kecamatan_id    = $request->kecamatan_id;
        // $shippings->kecamatan_nama  = $request->kecamatan_nama;
        // $shippings->alamat          = $request->alamat;
        // $shippings->kode_pos        = $request->kode_pos;
        // $shippings->save();

        $userId = auth()->user()->id;

        try {
            ShippingAddress::find($id)->update([
                'user_id' => $userId,
                'nama' => $request->nama,
                'telepon' => $request->telepon,
                'provinsi_id' => $request->provinsi,
                'provinsi_nama' => $namaProvinsi,
                'kota_id' => $request->kota,
                'kota_nama' => $namaKota,
                'kecamatan_id' => $request->kecamatan,
                'kecamatan_nama' => $namaKecamatan,
                'alamat' => $request->alamat,
                'kode_pos' => $request->kode_pos
            ]);

            return redirect(route('address.index'))->with(['success' => 'Alamat pengiriman berhasil dirubah']);
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
        

        // return redirect()->route('address.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shipping = ShippingAddress::findOrFail($id);
        $shipping->delete();

       return redirect()->route('address.index');
    }

    public function getProvinces()
    {
        return Provinsi::all();
    }

    public function getCities($provinceId)
    {
        $daftarKota = Kota::where('province_id', $provinceId)->get();
        return CityResource::collection($daftarKota);
    }

    public function getSubdistricts($cityId)
    {
        $daftarKecamatan = Kecamatan::where('city_id', $cityId)->get();
        // dd($daftarKecamatan);
        return SubdistrictResource::collection($daftarKecamatan);
    }

    public function setDefault($addressId)
    {
        // ambil id shipping address dari url
        // cari customer_id yang mempunyai shipping address tersebut
        // set semua shipping address yang selain id tadi menjadi 0
        // set shipping address id yang bersangutan menjadi 1

        try {
            $userId = auth()->user()->id;
            
            ShippingAddress::where('user_id', $userId)->where('id', '!=', $addressId)->update(['is_default'=> 0]);
            
            ShippingAddress::where('user_id', $userId)->where('id', $addressId)->update(['is_default'=> 1]);
            
            return redirect(route('address.index'))->with(['success' => 'Alamat utama berhasil diubah']);
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function newAddressPostCart()
    {
        $daftarProvinsi  = $this->getProvinces();
        return view('post-checkout.new-address', compact('daftarProvinsi'));
    }

    public function selectAddressPostCart()
    {
        $userId = auth()->user()->id;
        
        $shippings = ShippingAddress::where('user_id', $userId)->get();

        return view('post-checkout.select-address', compact('shippings'));
    }

    public function storePostCart(Request $request)
    {
        $namaProvinsi   = Provinsi::select('name')->where('province_id',$request->provinsi)->first()['name'];
        $namaKota       = Kota::select('name')->where('city_id',$request->kota)->first()['name'];
        $namaKecamatan  = Kecamatan::select('name')->where('subdistrict_id',$request->kecamatan)->first()['name'];

        $userId = auth()->user()->id;

        $this->validate($request, [
            'nama' => 'required|string',
            'telepon' => 'required|numeric',
            'provinsi' => 'required|numeric',
            'kota' => 'required|numeric',
            'kecamatan' => 'required|numeric',
            'alamat' => 'required|string',
            'kode_pos' => 'numeric'
        ]);
            
        try {
            $newShippingAddress = ShippingAddress::create([
                'user_id' => $userId,
                'nama' => $request->nama,
                'telepon' => $request->telepon,
                'provinsi_id' => $request->provinsi,
                'provinsi_nama' => $namaProvinsi,
                'kota_id' => $request->kota,
                'kota_nama' => $namaKota,
                'kecamatan_id' => $request->kecamatan,
                'kecamatan_nama' => $namaKecamatan,
                'alamat' => $request->alamat,
                'kode_pos' => $request->kode_pos,
                'is_default' => 1
            ]);

            return redirect(route('checkout'));
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function setDefaultPostCart($addressId)
    {
        // ambil id shipping address dari url
        // cari customer_id yang mempunyai shipping address tersebut
        // set semua shipping address yang selain id tadi menjadi 0
        // set shipping address id yang bersangutan menjadi 1

        try {
            $userId = auth()->user()->id;
            
            ShippingAddress::where('user_id', $userId)->where('id', '!=', $addressId)->update(['is_default'=> 0]);
            
            ShippingAddress::where('user_id', $userId)->where('id', $addressId)->update(['is_default'=> 1]);
            
            return redirect(route('checkout'));
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
