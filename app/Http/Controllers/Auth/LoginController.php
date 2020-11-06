<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Auth;
use Exception;
use App\Models\User;
use App\Models\Barang;
use App\Facades\Cart;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/';

    protected function redirectTo() {
        $user = Auth::user();

        if($user->hasRole('administrator')) {
            return route('admin.dashboard.index');
        } else {

            // user part of member 2424
            if($user->status == 2424) {
                $product = Barang::with('barangImages', 'barangRelated.barangDetail.barangImages')
                            ->where('kode_barang', 'CATALO')
                            ->first();

                $product->qty = 1;
                // insert cart catalog
                Cart::add($product);
            }

            if(!empty(Cart::get())) {
                if($user->status == 2424) { 
                    return route('home');
                } else {
                    return route('checkout');
                }                
            } else {
                return route('home');
            }

        }
    }
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $findUser = User::where('google_id', $user->id)->first();

            if ($findUser) {
                Auth::login($findUser);
                return redirect('/');
            } else {
                $newUser = User::create([
                    'name' => ucwords($user->name),
                    'email' => $user->email,
                    'photo' => $user->avatar,
                    'google_id' => $user->id
                ]);

                Auth::login($newUser);
                return redirect()->back();
            }
        } catch (Exception $e) {
            // dd($e->getMessage());
            return redirect('auth/google');
        }
    }
}
