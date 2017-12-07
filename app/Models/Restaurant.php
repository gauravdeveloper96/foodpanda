<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restaurant extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

     public function restaurantItem()
    {
        return $this->hasMany(RestaurantItem::class);
    }
}
