<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;   

class RestaurantItem extends Model
{
//    const class = "";

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function restaurants()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
}
