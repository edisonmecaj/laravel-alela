<?php

namespace App;

use Illuminate\Database\Eloquent\Model as LaravelModel;

class Model extends LaravelModel
{
    public function Category(){
        return $this->belongsTo(Make::class)->Category;
    }


    //mutators
    public static function getAddBtnAttribute(){
        return "<a href=\"".url('models/add')."\" class=\"btn btn-primary\"><i class=\"fas fa-plus\"></i> Add new Model</a>";
    }

    public function getEditBtnAttribute(){
        return "<a href=\"".url('models/'.$this->id.'/edit')."\" class=\"btn btn-primary btn-xs\"><i class=\"far fa-edit\"></i> Edit</a>";
    }

    public function getDeleteBtnAttribute(){
        return "<a href=\"".url('models/'.$this->id.'/delete')."\" class=\"btn btn-danger btn-xs\"><i class=\"far fa-trash-alt\"></i> Edit</a>";
    }
}
