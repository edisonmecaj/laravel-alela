<?php

namespace App\Http\Controllers;

use App\Make;
use Illuminate\Http\Request;
use App\Http\Requests\MakeRequest;

class MakeController extends Controller
{
    public function index(){
        $list = Make::all();
        return view("makes.index", compact("list"));
    }

    public function add(){
        $title = "Add new Make";
        $make = new Make;
        $cat = null;
        return view("makes.edit", compact("make", "title", "cat"));
    }

    public function create(MakeRequest $req){
        $m = Make::create($req->all());
        return redirect("makes")->with("success_message", "New Make created: {$m->name}");
    }

    public function edit(Make $make){
        $title = "Edit Make: ".$make->name;
        $cat = null;
        return view("makes.edit", compact("make", "title", "cat"));
    }

    public function update(Make $make, MakeRequest $req){
        $make->update($req->all());
        return redirect("makes")->with("success_message", "Make updated: {$make->name}");
    }

    public function delete(Make $make){
        $id = $make->id;
        $title = "Delete Make";
        $message = "Do you want to delete the Make ".$make->name."?";
        $return = "makes";
        return view("layouts.delete", compact("id", "title", "message", "return"));
    }

    public function destroy(Request $req){
        $m = Make::find($req->id);
        $m->delete();
        return redirect("makes")->with("success_message", "Make deleted: {$m->name}");
    }


    //from category
    public function categoryMakes(Category $cat){
        $list = $cat->Makes;
        return view("makes.index_category", compact("list"));
    }

    public function categoryAddMake(Category $cat){
        $title = "Add new Make";
        $make = new Make;
        return view("makes.edit", compact("make", "title", "cat"));
    }

    public function categoryCreateMake(Category $cat, MakeRequest $req){
        $m = Make::create($req->all());
        return redirect("categories/".$cat->id)->with("success_message", "New Make created: {$m->name} for the Category {$cat->name}");
    }

    public function categoryEditMake(Category $cat){
        $title = "Add new Make";
        $make = new Make;
        return view("makes.edit", compact("make", "title", "cat"));
    }

    public function categoryUpdateMake(Category $cat, Make $make, MakeRequest $req){
        $make->update($req->all());
        return redirect("categories/".$cat->id)->with("success_message", "Make updated: {$make->name} in the Category {$cat->name}");
    }

    public function categoryRemoveMake(Make $make){
        $id = $make->id;
        $title = "Delete Make";
        $message = "Do you want to delete the Make ".$make->name."?";
        $return = "makes";
        return view("layouts.delete", compact("id", "title", "message", "return"));
    }

    public function categoryUnlistMake(Request $req){
        $m = Make::find($req->id);
        $m->delete();
        return redirect("makes")->with("success_message", "Make deleted: {$m->name}");
    }
}
