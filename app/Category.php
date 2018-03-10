<?php

namespace App;

use App\Make;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function Makes(){
        return $this->hasMany(Make::class);
    }
}
