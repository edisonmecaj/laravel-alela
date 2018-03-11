<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model as LaravelModel;

class Model extends LaravelModel
{
    use SoftDeletes;
    
    protected $fillable = ["name", "make_id"];

    public function Category(){
        return $this->belongsTo(Make::class)->Category;
    }

    //mutators
    public function getEditBtnAttribute(){
        return "<a href=\"".url('models/'.$this->id.'/edit')."\" class=\"btn btn-primary btn-xs\"><i class=\"far fa-edit\"></i> Edit</a>";
    }

    public function getDeleteBtnAttribute(){
        return "<a href=\"".url('models/'.$this->id.'/delete')."\" class=\"btn btn-danger btn-xs\"><i class=\"far fa-trash-alt\"></i> Delete</a>";
    }
}
