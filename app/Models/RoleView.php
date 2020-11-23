<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleView extends Model
{
    protected $table = "vw_roles";

    public function getAll()
    {
        return RoleView::all();
    }

    public function findId($id)
    {
        $data = RoleView::find($id);

        if (!empty($data)) {
            return $data;
        } else {
            return false;
        }
    }

    public function getStokis()
    {
        $data = RoleView::where('role_name', 'stockist')
            ->select(['role_id', 'no_member', 'nama', 'role_name'])
            ->get();

        return $data;
    }
}
