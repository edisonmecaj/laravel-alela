<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function Makes(){
        return $this->hasMany(Make::class);
    }

    //mutators
    public static function getAddBtnAttribute(){
        return "<a href=\"".url('makes/add')."\" class=\"btn btn-primary\"><i class=\"fas fa-plus\"></i> Add new Category</a>";
    }
    
    public function getEditBtnAttribute(){
        return "<a href=\"".url('categories/'.$this->id.'/edit')."\" class=\"btn btn-primary btn-xs\"><i class=\"far fa-edit\"></i> Edit</a>";
    }

    public function getDeleteBtnAttribute(){
        return "<a href=\"".url('categories/'.$this->id.'/delete')."\" class=\"btn btn-danger btn-xs\"><i class=\"far fa-trash-alt\"></i> Edit</a>";
    }
}
