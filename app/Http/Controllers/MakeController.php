<?php

namespace App\Http\Controllers;

use App\Make;
use Illuminate\Http\Request;
use App\Http\Requests\MakeRequest;

class MakeController extends Controller
{
    public function index(){
        $list = Make::all();
        $name = "Make";
        $route = "makes";
        $title = "Makes List";
        return view("makes.index", compact("list"));
    }

    public function add(){
        $title = "Add new Make";
        return view("makes.edit", compact("title"));
    }

    public function create(MakeRequest $req){
        $m = Make::create($req->all());
        return redirect("makes")->with("success_message", "New Make created: {$m->name}");
    }

    public function edit(Make $make){
        $title = "Edit Make: ".$make->name;
        return view("makes.edit", compact(["item" => $make, "title" => $title]));
    }

    public function update(Make $make, MakeRequest $req){
        $make->update($req->all());
        return redirect("makes")->with("success_message", "Make updated: {$make->name}");
    }

    public function delete(Make $make){
        $title = "Delete Make";
        $question = "Do you want to delete the Make ".$make->name."?";
        return view("layouts.delete", compact("make", "title", "question"));
    }

    public function destroy(Request $req){
        $m = Make::find($req->id);
        $m->delete();
        return redirect("makes")->with("success_message", "Make deleted: {$m->name}");
    }
}
