<?php

namespace App\Models;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    public $guarded = [];

    public function getAll() {
        return Role::all();
    }
    public function user()
    {
    	return $this->belongsToMany('App\Models\User');
    }
}
