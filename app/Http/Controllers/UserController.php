<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view("profile.index", compact("user"));
    }

    public function update(Request $req){

    }
}
