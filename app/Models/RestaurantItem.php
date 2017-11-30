<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RestaurantItem extends Model
{
//    const class = "";

    public function restaurants()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
