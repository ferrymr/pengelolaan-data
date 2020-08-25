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
        $shippings = ShippingAddress::where('customer_id',14)->get();

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
        // $request->validate([
        //     'title' => 'required|max:255',
        //     'body' => 'required',
        // ]);

        $shippings    = ShippingAddress::find([16]);
        $customerId   = 14;

        $province_name    = RajaOngkir::provinsi()->find($request->provinsi)['province'];
        $city_name        = RajaOngkir::kota()->find($request->kota)['city_name'];
        $subdistrict_name = RajaOngkir::kecamatan()->find($request->kecamatan)['subdistrict_name'];

        $shippings = new ShippingAddress;
            
        $shippings->customer_id    = 14;
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

    public function setDefault($id)
    {
        // ambil id shipping address dari url
        // cari customer_id yang mempunyai shipping address tersebut
        // set semua shipping address yang selain id tadi menjadi 0
        // set shipping address id yang bersangutan menjadi 1

        $shipping    =  16;
        $customerId  =  14;

        $data = ShippingAddress::where('customer_id',$customerId)->where('id', '!=', $shipping)->update(['is_default'=> 0]);
        
        $data = ShippingAddress::where('customer_id',$customerId)->where('id', '=', $shipping)->update(['is_default'=> 1]);
        // dd($data);

        return redirect()->route('shippingaddress.index');
    }
}
