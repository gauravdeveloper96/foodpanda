<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function Item()
    {
        return $this->hasMany(Item::class, 'category_id');
    }
    
     public function restaurants()
    {
        return $this->hasMany(Restaurant::class);
    }
}
