<?php

namespace App;

use App\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $fillable = ["name"];

    public function Makes(){
        return $this->hasMany(Make::class);
    }

    public function Attributes(){
        return $this->hasMany(Attribute::class);
    }

    //mutators    
    public function getEditBtnAttribute(){
        return "<a href=\"".url('categories/'.$this->id.'/edit')."\" class=\"btn btn-primary btn-xs\"><i class=\"far fa-edit\"></i> <span class='hidden-xs hidden-sm'>Edit</span></a>";
    }

    public function getDeleteBtnAttribute(){
        return "<a href=\"".url('categories/'.$this->id.'/delete')."\" class=\"btn btn-danger btn-xs\"><i class=\"far fa-trash-alt\"></i> <span class='hidden-xs hidden-sm'>Delete</span></a>";
    }
}
