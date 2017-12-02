<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function create()
    {
        
        return view('backend.add_category') ;
      
    }
    public function store(Request $request)
    {

        $this->validate(request(),
            [

            'food-category' => 'required|min:3',
        ]);
       $food = new Category;
       $food->food_category= ucwords(request('food-category'));
       
       $food->save();
       return back();
    }
    
    public function addFoodItems(){
        
        return view('backend.add_food_items');
    }
}
