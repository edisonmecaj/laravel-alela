<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Attribute;
use Illuminate\Http\Request;
use App\Http\Requests\AttributeRequest;

class AttributeController extends Controller
{
    public function index(){
        $list = Attribute::orderBy("sort", "asc")->get();
        return view("attributes.index", compact("list"));
    }

    public function add(){
        $title = "Add new Attribute";
        $attr = new Attribute;
        $cat = null;
        return view("attributes.edit", compact("attr", "title", "cat"));
    }

    public function create(AttributeRequest $req){
        $req->request->add(["sort" => (Attribute::max("sort") + 1)]);
        $attr = Attribute::create($req->all());
        $propMenu = Menu::where("label", "Properties")->get()->first();
        if($propMenu){
            $propMenu->Childs()->create(["label" => $attr->name, "url" => "properties/{$attr->id}", "sort" => $attr->sort]);
        }
        return redirect("attributes")->with("success_message", "New Attribute created: {$attr->name}");
    }

    public function edit(Attribute $attr){
        $title = "Edit Attribute: ".$attr->name;
        $cat = null;
        return view("attributes.edit", compact("attr", "title", "cat"));
    }

    public function update(Attribute $attr, AttributeRequest $req){
        $attr->update($req->all());
        return redirect("attributes")->with("success_message", "Attribute updated: {$attr->name}");
    }

    public function delete(Attribute $attr){
        $id = $attr->id;
        $title = "Delete Attribute";
        $message = "Do you want to delete the Attribute ".$attr->name."?";
        $return = "attributes";
        return view("layouts.delete", compact("id", "title", "message", "return"));
    }

    public function destroy(Request $req){
        $m = Attribute::find($req->id);
        if($m){
            $m->delete();
            $propMenu = Menu::where("label", "Properties")->get()->first();
            if($propMenu){
                $sm = $propMenu->Childs->find($m->id);
                dd($sm);
                if($sm){
                    $sm->delete();
                }
            }
            return redirect("attributes")->with("success_message", "Attribute deleted: {$m->name}");
        }
        return redirect("attributes");
    }

    public function updateSort(Request $req){
        foreach(json_decode($req->json) as $r){
            $a = Attribute::find($r->id);
            $a->sort = $r->sort;
            $a->save();
        }
        return [];
    }
}
