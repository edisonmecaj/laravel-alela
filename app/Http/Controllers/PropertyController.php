<?php

namespace App\Http\Controllers;

use App\Attribute;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(Attribute $attr){
        $list = $attr->Properties;
        return view("properties.index", compact("list"));
    }

    public function add(Attribute $attr){
        $title = "Add new Category";
        $cat = new Category;
        return view("properties.edit", compact("cat", "title"));
    }

    public function create(Attribute $attr, CategoryRequest $req){
        $c = Category::create($req->all());
        return redirect("properties/".$attr->id)->with("success_message", "New Category created: {$c->name}");
    }

    public function edit(Attribute $attr, Category $cat){
        $title = "Edit Category: ".$cat->name;
        return view("properties.edit", compact("cat", "title"));
    }

    public function update(Attribute $attr, Category $cat, CategoryRequest $req){
        $cat->update($req->all());
        return redirect("properties/".$attr->id)->with("success_message", "Category updated: {$cat->name}");
    }

    public function delete(Attribute $attr, Category $cat){
        $title = "Delete Category";
        $id = $cat->id;
        $return = "properties";
        $message = "Do you want to delete the Category ".$cat->name."?";
        return view("layouts.delete", compact("id", "title", "message", "return"));
    }

    public function destroy(Attribute $attr, Request $req){
        $c = Category::find($req->id);
        $c->delete();
        return redirect("properties/".$attr->id)->with("success_message", "Category deleted: {$c->name}");
    }
}
