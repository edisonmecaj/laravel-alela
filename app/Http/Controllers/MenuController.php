<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;

class MenuController extends Controller
{
    protected function messages()
    {
        return [
            "label.required" => "The label field is required",
            "label.min" => "The label field must be at least 2 characters long",
            "label.max" => "The label field must contain not more than 20 characters"
        ];
    }

    public function updateMenu(Request $req){
        foreach(json_decode($req->json) as $m){
            $menu = Menu::find($m->id);
            $menu->parent = $m->parent;
            $menu->sort = $m->sort;
            $menu->save();
        }
        return back()->with("success_message", "Menu arrangment updated successfully");
    }

    public function index(){
        return view("menus.index");
    }

    public function add(){
        return view("menus.add");
    }

    public function create(Request $req){
        $val = Validator::make($req->all(), ["label" => "required|string|min:2|max:20"]);
        if($val->fails()){
            return back()->withErrors($val->errors())->withInput();
        }
        $sort = Menu::max("sort")+1;
        $req->request->add(["sort" => $sort]);
        $menu = Menu::create($req->all());
        $menu->Roles()->sync($req->roles);
        return redirect("menus")->with("success_message", "Menu Item created successfully");
    }

    public function update(Request $req){
        $val = Validator::make($req->all(), ["label" => "required|string|min:2|max:20"]);
        if($val->fails()){
            return Response::json(["errors" => $val->errors()]);
        }
        $menu = Menu::find($req->menu);
        $menu->update($req->all());
        $menu->Roles()->sync($req->roles);
        Session::put(["success_message" => "The menu ".$menu->label." has been updated"]);
        return Response::json([]);
    }

    public function delete(Request $req){
        $menu = Menu::find($req->menu_id);
        $menu->delete();
        return redirect("menus")->with("success_message", "The menu item <b>{$menu->label}</b> has been deleted successfully");
    }
}
