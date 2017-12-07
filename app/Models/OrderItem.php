<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    public function orders(){

        return $this->belongsTo(Order::class, 'order_id');
    }
    public function Items(){

        return $this->belongsTo(Item::class,'item_id');
    }
}
