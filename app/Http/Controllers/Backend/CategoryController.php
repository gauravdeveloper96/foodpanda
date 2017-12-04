<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
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
       $food->category= ucwords(request('food-category'));

       $food->save();
       
       Session::flash('message', ucwords($food->category).' successfully added into food category.');
       return redirect()->route('admin.categories.create');
    }
    
    public function addFoodItems(){
        
        return view('backend.add_food_items');
    }
}
