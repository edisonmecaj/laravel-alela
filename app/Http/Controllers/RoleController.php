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
        return view("roles.edit");
    }

    public function create(RoleRequest $req){
        $r = Role::create($req->all());
        return redirect("roles")->with("success_message", "New Role created: {$r->name}");
    }

    public function edit(Role $role){
        return view("roles.edit", compact("role"));
    }

    public function update(Role $role, RoleRequest $req){
        $role->update($req->all());
        return redirect("roles")->with("success_message", "Role updated: {$role->name}");
    }

    public function delete(Role $role){
        return view("roles.delete", compact("role"));
    }

    public function destroy(Request $req){
        $r = Role::find($req->id);
        $r->delete();
        return redirect("roles")->with("success_message", "Role deleted: {$r->name}");
    }
}
