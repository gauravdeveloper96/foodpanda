<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restaurant extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

     public function Items()
    {
        return $this->hasMany(Item::class);
    }

    public function category()
    {
        return $this->hasMany(Category::class);
    }

     public function orders(){

        return $this->hasMany(Order::class);
    }

}
