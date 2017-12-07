<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;   

class Item extends Model
{
//    const class = "";

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function restaurants()
    {
        return $this->belongsTo(Restaurant::class,'restaurant_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

//    public function orders(){
//
//        return $this->belongsTo(Order::class);
//    }
    public function orderItems(){

        return $this->hasMany(OrderItem::class,'item_id');
    }
}
