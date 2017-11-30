<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\RestaurantItem;
use Illuminate\Http\Request;
use App\Models\FoodCategory;

class RestaurantItemController extends Controller
{
//    public function index(){
//
//        return view('backend.add_food_items');
//    }
    public function addFoodItems($restro_id){

        $category = FoodCategory::pluck('item_types','id');
        return view('backend.add_food_items', compact('category','restro_id'));
    }
    public function store(Request $request){

        $this->validate(request(),
            [

            'item-name' => 'required|min:5',
            'price' => 'required|min:1',
            
        ]);

        $restro_items = new RestaurantItem;

        $restro_items->item_name= request('item-name');
        $restro_items->price= request('price');
        $restro_items->restaurant_id= $restro_id;
        $restro_items->category_id= $category->id;

        dd($restro_items);


        return ;
    }
}
