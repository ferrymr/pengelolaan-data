<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Profile;
use App\ShippingAddress;
use App\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        $profile = User::find($user->id);

        return view('profile', compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $user = auth()->user();

        $profile = User::find($user->id);

        return view('edit-profile', compact('profile'));
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
        $this->validate($request, [
            'nik' => 'string',
            'name' => 'required|string',
            'birthdate' => 'date',
            'gender' => 'string',
            'phone' => 'string'
        ]);
            
        try {
            $profile = User::find($id);

            // JIKA FIELD PASSWORD TIDAK KOSONG MAKA HASH ISI FIELD PASSWORD TERSEBUT
            // JIKA FIELD PASSWORD KOSONG MAKA HAPUS DARI OBJECT REQUEST
            if ($request->password != null) {
                $request->merge(['password' => Hash::make($request->password)]);
            } else {
                $request->request->remove('password');
            }

            $profile->update($request->all());

            return redirect(route('profile.index'))->with(['success' => 'Profil berhasil diubah']);
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
