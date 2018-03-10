<?php

namespace App;

use App\Make;
use App\Category;
use Illuminate\Database\Eloquent\Model as LaravelModel;

class Model extends LaravelModel
{
    public function Category(){
        return $this->belongsTo(Make::class)->Category;
    }
}
