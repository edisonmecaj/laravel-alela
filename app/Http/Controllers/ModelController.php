<?php

namespace App\Http\Controllers;

use App\Model;
use Illuminate\Http\Request;
use App\Http\Requests\ModelRequest;

class ModelController extends Controller
{
    public function index(){
        $list = Model::all();
        return view("models.index", compact("list"));
    }

    public function add(){
        $title = "Add new Model";
        $model = new Model;
        $cat = null;
        return view("models.edit", compact("model", "title", "cat"));
    }

    public function create(ModelRequest $req){
        $m = Model::create($req->all());
        return redirect("models")->with("success_message", "New Model created: {$m->name}");
    }

    public function edit(Model $model){
        $title = "Edit Model: ".$model->name;
        $cat = null;
        return view("models.edit", compact("model", "title", "cat"));
    }

    public function update(Model $model, ModelRequest $req){
        $model->update($req->all());
        return redirect("models")->with("success_message", "Model updated: {$model->name}");
    }

    public function delete(Model $model){
        $id = $model->id;
        $title = "Delete Model";
        $message = "Do you want to delete the Model ".$model->name."?";
        $return = "models";
        return view("layouts.delete", compact("id", "title", "message", "return"));
    }

    public function destroy(Request $req){
        $m = Model::find($req->id);
        $m->delete();
        return redirect("models")->with("success_message", "Model deleted: {$m->name}");
    }
}
