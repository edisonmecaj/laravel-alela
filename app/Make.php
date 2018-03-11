<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Make extends Model
{
    public function Category(){
        return $this->belongsTo(Category::class);
    }

    public function Models(){
        return $this->hasMany(Model::class);
    }


    //mutators
    public function getEditBtnAttribute(){
        return "<a href=\"".url('makes/'.$this->id.'/edit')."\" class=\"btn btn-primary btn-xs\"><i class=\"far fa-edit\"></i> Edit</a>";
    }

    public function getDeleteBtnAttribute(){
        return "<a href=\"".url('makes/'.$this->id.'/delete')."\" class=\"btn btn-danger btn-xs\"><i class=\"far fa-trash-alt\"></i> Edit</a>";
    }
}
