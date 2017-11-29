<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FoodCategoryController extends Controller
{
    public function addFoodCategory()
    {
        
        return view('backend.add_category') ;
      
    }
}
