<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Role;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\ShippingAddress;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Facades\Cart;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    // protected $redirectTo = '/';

    public function redirectTo()
    {
        if(!empty(Cart::get())) {
            return 'transaction/checkout';
        } else {
            return '/';
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // dd($data);
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return App\Models\User
     */
    protected function create(array $data)
    {
        if(isset($data['flag_role']) &&  $data['flag_role'] == "on") {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'code_aff_ref' => $data['code_aff_ref'],
                'password' => Hash::make($data['password']),
                'status' => 2424 // flag_member
            ]);
        } else if(isset($data['flag_reseller']) && $data['flag_reseller'] == "on") {

            // input file ktp
            if(!empty($data['file'])) {
                $file = $data['file'];
                $nama_file = 'ktp-' . $data['name'] .'-' . date('YmdHis') . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('public/ktp', $nama_file);
            }  else {
                $nama_file = "";
            }

            $input = [
                'name' => $data['name'],
                'birthdate' => $data['birthdate'],
                'alamat' => $data['address'],
                'propinsi' => $data['provinsi'],
                'kota' => $data['kota'],
                'kecamatan' => $data['kecamatan'],
                'phone' => $data['phone'],
                'email' => $data['email'],
                'code_aff_ref' => $data['code_aff_ref'],
                'nik' => $data['nik'],
                'foto_ktp' => $nama_file,
                'bank' => $data['bank'],
                'norek' => $data['bank_account'],
                'password' => Hash::make($data['password']),
                'status' => 2525 // flag_reseller
            ];
            $user = User::create($input);

            // also need to save on address default
            $namaProvinsi   = Provinsi::select('name')->where('province_id', $data['provinsi'])->first()['name'];
            $namaKota       = Kota::select('name')->where('city_id', $data['kota'])->first()['name'];
            $namaKecamatan  = Kecamatan::select('name')->where('subdistrict_id', $data['kecamatan'])->first()['name'];
            
            $newShippingAddress = ShippingAddress::create([
                'user_id' => $user->id,
                'nama_pengirim' => $data['name'],
                'telepon_pengirim' => $data['phone'],
                'nama' => $data['name'],
                'telepon' => $data['phone'],
                'provinsi_id' => $data['provinsi'],
                'provinsi_nama' => $namaProvinsi,
                'kota_id' => $data['kota'],
                'kota_nama' => $namaKota,
                'kecamatan_id' => $data['kecamatan'],
                'kecamatan_nama' => $namaKecamatan,
                'alamat' => $data['address'],
                'code_aff_ref' => $data['code_aff_ref'],
                'kode_pos' => null,
                'is_default' => 1
            ]);

        } else {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
            
        }       
    
        // check user role biasa
        $assign = Role::where('name', 'user')->first();

        $user->attachRole($assign);

        return $user;
    }
}
