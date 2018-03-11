<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attribute extends Model
{
    use SoftDeletes;

    protected $fillable = ["name", "category_id", "required", "sort"];

    public function Category(){
        return $this->belongsTo(Category::class);
    }

    //mutators
    public function getEditBtnAttribute(){
        return "<a href=\"".url('attributes/'.$this->id.'/edit')."\" class=\"btn btn-primary btn-xs\"><i class=\"far fa-edit\"></i> <span class='hidden-xs hidden-sm'>Edit</span></a>";
    }

    public function getDeleteBtnAttribute(){
        return "<a href=\"".url('attributes/'.$this->id.'/delete')."\" class=\"btn btn-danger btn-xs\"><i class=\"far fa-trash-alt\"></i> <span class='hidden-xs hidden-sm'>Delete</span></a>";
    }

    public function getReqAttribute(){
        return $this->required ? "<span class='btn btn-xs btn-success'>YES</span>" : "<span class='btn btn-xs btn-danger'>NO</span>";
    }
}
