<?php

namespace App;

use App\User;
use App\Menu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;
    
    protected $fillable = ["role", "label", "level"];

    public function Users(){
        return $this->hasMany(User::class)->withTimestamps();
    }

    public function Menus(){
        return $this->belongsToMany(Menu::class)->withTimestamps();
    }


    //mutators
    public function getEditBtnAttribute(){
        return "<a href=\"".url('roles/'.$this->id.'/edit')."\" class=\"btn btn-primary btn-xs\"><i class=\"far fa-edit\"></i> Edit</a>";
    }

    public function getDeleteBtnAttribute(){
        return "<a href=\"".url('roles/'.$this->id.'/delete')."\" class=\"btn btn-danger btn-xs\"><i class=\"far fa-trash-alt\"></i> Edit</a>";
    }
}
