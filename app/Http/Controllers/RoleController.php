<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::orderBy("level", "desc")->get();
        return view("roles.index", compact("roles"));
    }

    public function add(){
        $role = new Role;
        return view("roles.edit", compact("role"));
    }

    public function create(RoleRequest $req){
        $r = Role::create($req->all());
        return redirect("roles")->with("success_message", "New Role created: {$r->label}");
    }

    public function edit(Role $role){
        return view("roles.edit", compact("role"));
    }

    public function update(Role $role, RoleRequest $req){
        $role->update($req->all());
        return redirect("roles")->with("success_message", "Role updated: {$role->label}");
    }

    public function delete(Role $role){
        $id = $role->id;
        $title = "Delete Role";
        $message = "Do you want to delete the Role {$role->label}?";
        $return = "roles";
        return view("layouts.delete", compact("id", "title", "message", "return"));
    }

    public function destroy(Request $req){
        $r = Role::find($req->id);
        $r->delete();
        return redirect("roles")->with("success_message", "Role deleted: {$r->label}");
    }
}
