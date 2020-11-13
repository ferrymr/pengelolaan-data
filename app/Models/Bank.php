<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table = 'tb_master_bank';
    protected $fillable = [
        'bank_name',
        'bank_account',
        'description'
    ];

    public function getAll()
    {
        return Bank::all();
    }

    public function addBank($request)
    {
        $bank = array(
            'bank_name' => $request['bank_name'],
            'bank_account' => $request['bank_account'],
            'description' => $request['description'],
        );

        $bank = Bank::create($bank);

        return $bank;
    }

    public function editBank($request, $id)
    {

        $data = Bank::where('id', $id)->update($request);

        if (!empty($data)) {
            return $data;
        } else {
            return false;
        }
    }

    public function deleteBank($id)
    {
        $data = Bank::find($id);

        if (!empty($data)) {
            $data->delete();
            return $data;
        } else {
            return false;
        }
    }
}
