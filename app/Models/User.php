<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;
use DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'no_member',
        'nik',
        'name',
        'birthdate',
        'gender',
        'phone',
        'email',
        'password',
        'photo',
        'google_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAll()
    {
        return User::all();
    }

    public function getDistributor()
    {
        return User::whereHas('roles', function ($q) {
            $q->where('name', 'distributor');
        })->get();
    }

    public function getUser($roleId)
    {
        return User::whereHas('roles', function ($q) use ($roleId) {
            $q->where('id', $roleId);
        })->get();
    }

    public function getUserByEmail($email)
    {
        return DB::table('users')->where('email', $email)->first();
    }

    public function getUserVerify($email, $code)
    {
        return DB::table('users')->where('email', $email)->where('code_verify', $code)->first();
    }

    public function addUser($request)
    {
        $digits = 4;
        $code = rand(pow(10, $digits - 1), pow(10, $digits) - 1);
        $user = array(
            'no_member' => $request['no_member'],
            'nik' => $request['nik'],
            'name' => $request['name'],
            'birthdate' => $request['birthdate'],
            'gender' => $request['gender'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            // 'photo' => $request['photo'],
            // 'code_verify' => $code,
            // 'status_verify' => $request['status_verify'],
            // 'firebase_key' => $request['firebase_key'],            
        );

        $user = User::create($user);

        // insert to role
        $role_user = array(
            'role_id' => $request['role_id'],
            'user_id' => $user['id'],
            'user_type' => 'App\Models\User'
        );

        DB::table('role_user')->insert($role_user);

        return $user;
    }

    public function updateStatusByEmail($email)
    {
        $data = User::where('email', $email)
            ->update(['status_verify' => 1, 'updated_at' => Carbon::now()]);
        if (!empty($data)) {
            return $data;
        } else {
            return false;
        }
    }

    public function updateCodeByEmail($email)
    {
        $digits = 4;
        $code = rand(pow(10, $digits - 1), pow(10, $digits) - 1);
        $data = User::where('email', $email)
            ->update(['code_verify' => $code, 'updated_at' => Carbon::now()]);

        // get user data
        $user = User::where('email', $email)->first();

        if (!empty($data)) {
            return $user;
        } else {
            return false;
        }
    }

    public function deleteUser($id)
    {
        $data = User::find($id);

        $role = DB::table('role_user')->where('user_id', $id)->first();

        // delete the existing one
        DB::table('role_user')->where('role_id', $role->role_id)->where('user_id', $id)->delete();

        if (!empty($data)) {
            $data->delete();
            return $data;
        } else {
            return false;
        }
    }

    public function findId($id)
    {
        $data = User::find($id);
        if (!empty($data)) {
            return $data;
        } else {
            return false;
        }
    }

    public function updateAPIKey($request, $id)
    {
        $data = User::where('id', $id)
            ->update($request);
        if (!empty($data)) {
            return $data;
        } else {
            return false;
        }
    }

    public function editPassword($param, $id)
    {
        $data = User::where('id', $id)
            ->update($param);

        if (!empty($data)) {
            return $data;
        } else {
            return false;
        }
    }

    public function editUser($request, $id, $role_id)
    {

        $data = User::where('id', $id)
            ->update($request);

        $role = DB::table('role_user')->where('user_id', $id)->first();

        // delete the existing one
        DB::table('role_user')->where('role_id', $role->role_id)->where('user_id', $id)->delete();

        // insert to role
        $role_user = array(
            'role_id' => $role_id,
            'user_id' => $id,
            'user_type' => 'App\User'
        );
        return DB::table('role_user')->insert($role_user);

        if (!empty($data)) {
            return $data;
        } else {
            return false;
        }
    }

    public function editUserMobile($request, $id)
    {
        $data = User::where('id', $id)
            ->update($request);

        if (!empty($data)) {
            return $data;
        } else {
            return false;
        }
    }

    public function editPengaturanUser($request, $id, $for_what)
    {

        // unlink old image

        if (!empty($request['foto'])) {
            $data2 = User::find($id);
            if ((file_exists(base_path() . '/storage/app/public/foto-dokter/' . $data2->foto)
                && !empty($data2->foto))) {
                unlink(base_path() . '/storage/app/public/foto-dokter/' . $data2->foto);
            }
        }

        $data = user::where('id', $id)
            ->update($request);

        // return userdata
        $user = user::where('id', $id)->first();

        if (!empty($data)) {
            return $data;
        } else {
            return false;
        }
    }

    public function getRegisteredCustomer()
    {
        return DB::table('role_user')->where('role_id', 5)->count();
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new Notifications\MailResetPasswordNotification($token));
    }

    public function activateAccount($user_id, $code)
    {
        $data = user::where('id', $user_id)
            ->where('code_verify', $code);
        if ($data) {
            $data->update(["code_verify" => 1]);
            return true;
        } else {
            return false;
        }
    }

    public function transactions()
    {
        return $this->hasMany(TbHeadJual::class);
    }

    public function shippingAddress()
    {
        return $this->hasMany(ShippingAddress::class);
    }

    public function headjual()
    {
        return $this->hasMany(TbHeadjual::class, 'user_id');
    }
}
