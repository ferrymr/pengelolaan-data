<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct (
        User $user,
        Role $role
    ) {
        $this->userRepo = $user;
        $this->roleRepo = $role;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $users = $this->userRepo->getAll();
        // dd($user);
        return view('backend.store.user.index')->with([
            'user' => $user,
            'users' => $users,
        ]);
    }

    public function datatable() {

        $users = $this->userRepo->getAll();

        return Datatables::of($users)
            ->editColumn('role', function($user) {
                return $user->roles[0]->display_name;
            })
            ->editColumn('created_at', function($user) {
                return date('d F Y', strtotime($user->created_at));
            })
            ->addColumn('action', function ($user){
                return [
                    'edit' => route('admin.user.edit', $user->id),
                    'hapus' => route('admin.user.delete', $user->id),
                ];
            })
            ->escapeColumns([])
            ->make(true);

    }

    public function getDistributor() {
        return $this->userRepo->getDistributor();
    }

    public function getUser($roleId) {
        return $this->userRepo->getUser($roleId);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $roles = $this->roleRepo->getAll();
        
        return view('backend.store.user.create')->with([
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        // dd($request->all());
        $user = $this->userRepo->addUser($request->all());

        if(!$this->userRepo->error) {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>User Berhasil Ditambah</strong>')->success();
            return redirect()->route('admin.user.index');
        } else {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>User </strong> ' . $this->userRepo->error)->error()->important();
            return redirect()->route('admin.user.add')->withInput()->withError();
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
        $user = Auth::user();
        $currentUser = $this->userRepo->findId($id);
        $roles = $this->roleRepo->getAll();

        return view('backend.store.user.edit')->with([
            'user' => $user,
            'currentUser' => $currentUser,
            'roles' => $roles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateUserRequest $request, $id)
    {
        // dd($request->all());

        // password kosong
        $param = array(
            "name" => $request->input('name'),
            // "distributor_id" => $request->input('distributor_id') ? $request->input('distributor_id') : null,
            "phone" => $request->input('phone'),
            "email" => $request->input('email'),
            // "discount" => $request->input('discount'),
            // "address" => $request->input('address'),
            // "description" => $request->input('description'),
        );
    
        $User = $this->userRepo->editUser($param, $id, $request->input('role_id'));

        if(!$this->userRepo->error) {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>User berhasil diupdate</strong>')->success();
            return redirect()->route('admin.user.index');
        } else {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>User </strong> ' . $this->userRepo->error)->error()->important();
            return redirect()->route('admin.user.edit')->withInput()->withError();
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
        $data = $this->userRepo->deleteUser($id);
        if(!empty($data)) {
            flash()->success('<i class="fa fa-info"></i>&nbsp; <strong>User berhasil dihapus</strong>');
            return redirect()->route('admin.user.index');
        } else {
            flash()->success('<i class="fa fa-info"></i>&nbsp; <strong>User Tidak Ditemukan</strong>');
            return redirect()->route('admin.user.index');
        }
    }


    // ======================= GANTI PASSWORD ===================================
    
    public function indexGantiPassword($id)
    {
        $user = Auth::user();
        $currentUser = $this->userRepo->findId($user->id);
        return view('backend.store.user.edit-password')->with([
            'user' => $user,
            'currentUserId' => $id,
        ]);
    }

    public function updatePassword(Request $request, $id)
    {
        // password kosong
        if($request->input('password') == '') {
            $param = array();
        } else {
            $param = array(
                "password" => Hash::make($request->input('password')),
            );
        }
        
        $User = $this->userRepo->editPassword($param, $request->input('id'));

        if(!$this->userRepo->error) {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Password Berhasil Diedit</strong>')->success();
            return redirect()->route('admin.master.ganti-password.index', $id);
        } else {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Password </strong> ' . $this->userRepo->error)->error()->important();
            return redirect()->route('admin.master.ganti-password.index', $id)->withInput()->withError();
        }
    }

    // =============================== ACTIVATION ===============================

    public function activation($user_id, $code) {
        if($user_id == '' || $code == '' || $code == 1) {
            dd("didideu");
            // redirect failed
            return redirect("activation-failed");
        } else {
            $user = $this->userRepo->activateAccount($user_id, $code);
            
            if($user) {
                // redirect success
                return redirect('activation-success');
            } else {
                // redirect failed
                return redirect('activation-failed');
            }
        }
    }
}
