<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FoodCategory;

class FoodCategoryController extends Controller
{
    public function addFoodCategory()
    {
        
        return view('backend.add_category') ;
      
    }
    public function storeFoodTypes(Request $request)
    {

        $this->validate(request(),
            [

            'food-category' => 'required|min:3',
        ]);
       $food = new FoodCategory;
       $food->item_types= request('food-category');
       
       $food->save();
       return back();
    }
    
    public function addFoodItems(){
        
        return view('backend.add_food_items');
    }
}
