<?php

namespace App\Http\Controllers;

use App\ShippingAddress;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Http;
use Kavist\RajaOngkir\Facades\RajaOngkir;
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
        $daftarProvinsi  = RajaOngkir::provinsi()->all();
        $daftarKota      = RajaOngkir::kota()->get();
        $daftarKecamatan = RajaOngkir::kecamatan()->get();

        return view('address-form', compact('daftarProvinsi', 'daftarKota', 'daftarKecamatan'));
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $namaProvinsi    = RajaOngkir::provinsi()->find($request->provinsi)['province'];
        $namaKota        = RajaOngkir::kota()->find($request->kota)['city_name'];
        $namaKecamatan = RajaOngkir::kecamatan()->find($request->kecamatan)['subdistrict_name'];
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

        $daftarProvinsi  = RajaOngkir::provinsi()->all();
        $daftarKota      = RajaOngkir::kota()->dariProvinsi($shipping->provinsi_id)->get();
        $daftarKecamatan = RajaOngkir::kecamatan()->dariKota($shipping->kota_id)->get();

        return view('address-edit', compact('shipping','daftarProvinsi','daftarKota','daftarKecamatan'));
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
        
        $shippings = ShippingAddress::findOrFail($id);

        $province_name    = RajaOngkir::provinsi()->find($request->provinsi)['province'];
        $city_name        = RajaOngkir::kota()->find($request->kota)['city_name'];
        $subdistrict_name = RajaOngkir::kecamatan()->find($request->kecamatan)['subdistrict_name'];

        $shippings->nama            = $request->nama;
        $shippings->telepon         = $request->telepon;
        $shippings->provinsi_id     = $request->provinsi;
        $shippings->provinsi_nama   = $province_name;
        $shippings->kota_id         = $request->kota;
        $shippings->kota_nama       = $city_name;
        $shippings->kecamatan_id    = $request->kecamatan;
        $shippings->kecamatan_nama  = $subdistrict_name;
        $shippings->alamat          = $request->alamat;
        $shippings->kode_pos        = $request->kode_pos;
        $shippings->save();
        

        return redirect()->route('address.index');

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

    public function getCities($provinceId)
    {
        $daftarKota = RajaOngkir::kota()->dariProvinsi($provinceId)->get();
        return CityResource::collection($daftarKota);
    }

    public function getSubdistricts($cityId)
    {
        $daftarKecamatan = RajaOngkir::kecamatan()->dariKota($cityId)->get();
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
}
