<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;

class Make extends Model
{
    public function Category(){
        return $this->belongsTo(Category::class);
    }

    public function Models(){
        return $this->hasMany(Model::class);
    }
}
