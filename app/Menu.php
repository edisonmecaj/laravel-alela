<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ["label", "url", "icon", "class", "parent", "sort"];

    public function Roles(){
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function HasChilds(){
        return $this->hasMany(Menu::class, "parent")->count() > 0;
    }

    public function Childs(){
        return $this->hasMany(Menu::class, "parent");
    }
}
