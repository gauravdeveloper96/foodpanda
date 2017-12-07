<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    
    public function restaurants(){

       return $this->belongsTo(Restaurant::class,'restaurant_id');
    }


    public function orderItems(){

        return $this->hasMany(OrderItem::class,'order_id');
    }
    
}
