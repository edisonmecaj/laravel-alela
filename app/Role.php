<?php

namespace App;

use App\User;
use App\Menu;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ["role", "label", "level"];

    public function Users(){
        return $this->hasMany(User::class)->withTimestamps();
    }

    public function Menus(){
        return $this->belongsToMany(Menu::class)->withTimestamps();
    }
}
