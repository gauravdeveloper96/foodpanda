<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fileentry extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

     public function restaurants()
    {
        return $this->hasOne(Restaurant::class);
    }
}
