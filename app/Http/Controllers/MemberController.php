<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function signup() {
        $banks = array('BCA', 'BNI', 'BRI', 'MANDIRI');
        return view('frontend.profiles.members.signup-form', 
                compact('banks'));
    }
}
