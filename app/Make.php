<?php

namespace App;

use App\Model;
use App\Attribute;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model as LaravelModel;

class Make extends LaravelModel
{
    use SoftDeletes;
    
    protected $fillable = ["name", "category_id"];

    public function Category(){
        return $this->belongsTo(Category::class);
    }

    public function Models(){
        return $this->hasMany(Model::class);
    }

    public function Attributes(){
        return $this->Category->Attributes();
    }


    //mutators
    public function getEditBtnAttribute(){
        return "<a href=\"".url('makes/'.$this->id.'/edit')."\" class=\"btn btn-primary btn-xs\"><i class=\"far fa-edit\"></i> <span class='hidden-xs hidden-sm'>Edit</span></a>";
    }

    public function getDeleteBtnAttribute(){
        return "<a href=\"".url('makes/'.$this->id.'/delete')."\" class=\"btn btn-danger btn-xs\"><i class=\"far fa-trash-alt\"></i> <span class='hidden-xs hidden-sm'>Delete</span></a>";
    }
}
