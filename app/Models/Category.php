<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function Items()
    {
        return $this->hasMany(Item::class, 'category_id');
    }
    
    
}
