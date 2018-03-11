<?php

namespace App;

use Illuminate\Database\Eloquent\Model as LaravelModel;

class Model extends LaravelModel
{
    public function Category(){
        return $this->belongsTo(Make::class)->Category;
    }
}
