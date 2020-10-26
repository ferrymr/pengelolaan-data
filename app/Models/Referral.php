<?php

namespace App;
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    protected $table = "users";

    protected $primaryKey = "no_member";

    public $incrementing = false;

    protected $fillable = [
        'kode_up',
        'kode_dr'
    ];

    public function getAll()
    {
        return Referral::all();
    }
}
