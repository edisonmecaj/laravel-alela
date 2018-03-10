<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MakeRequest;

class MakeController extends Controller
{
    public function index(){
        $makes = Make::all();
        $title = "Makes List";
        return view("lists.simple", compact("makes", "title"));
    }

    public function add(){
        $title = "Add new Make";
        return view("forms.simple.edit");
    }

    public function create(MakeRequest $req){
        
    }
}
