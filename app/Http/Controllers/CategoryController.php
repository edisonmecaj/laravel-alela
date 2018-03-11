<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index(){
        $list = Category::all();
        $name = "Category";
        $route = "categories";
        $title = "Categories List";
        return view("categories.index", compact("list", "title", "name", "route"));
    }

    public function add(){
        $title = "Add new Category";
        $cat = new Category;
        return view("categories.edit", compact("cat", "title"));
    }

    public function create(CategoryRequest $req){
        $c = Category::create($req->all());
        return redirect("categories")->with("success_message", "New Category created: {$c->name}");
    }

    public function edit(Category $cat){
        $title = "Edit Category: ".$cat->name;
        return view("categories.edit", compact("cat", "title"));
    }

    public function update(Category $cat, CategoryRequest $req){
        $cat->update($req->all());
        return redirect("categories")->with("success_message", "Category updated: {$cat->name}");
    }

    public function delete(Category $cat){
        $title = "Delete Category";
        $id = $cat->id;
        $return = "categories";
        $message = "Do you want to delete the Category ".$cat->name."?";
        return view("layouts.delete", compact("id", "title", "message", "return"));
    }

    public function destroy(Request $req){
        $c = Category::find($req->id);
        $c->delete();
        return redirect("categories")->with("success_message", "Category deleted: {$c->name}");
    }
}
