<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ["label", "url", "icon", "class", "parent", "sort", "dynamic_items"];

    public function Roles(){
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function HasChilds(){
        return $this->hasMany(Menu::class, "parent")->count() > 0;
    }

    public function Childs(){
        return $this->hasMany(Menu::class, "parent");
    }

    public function HasDynamic(){
        return $this->DynamicChilds()->count() > 0;
    }

    public function DynamicChilds(){
        try
        {
            if(!empty($this->dynamic_items)){
                $main = explode(":", $this->dynamic_items);
                $model = "App\\".$main[0];
                $sec = explode(".", $main[1]);
                $sort = sizeof($sec) > 1 ? $sec[1] : "id";
                return $model::select("id", $sec[0]." as label")->orderBy($sort, "asc")->get();
            }
            return collect([]);
        }
        catch(Exception $e)
        {
            return collect([]);
        }
    }
}
