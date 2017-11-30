<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\RestaurantItem;
use Illuminate\Http\Request;

class RestaurantItemController extends Controller
{
//    public function index(){
//
//        return view('backend.add_food_items');
//    }
    public function addFoodItems(){

        $category = RestaurantItem::all('item_types');
        dd($category);
        return view('backend.add_food_items', compact('category'));
    }
    public function store($restro_id){

        return ;
    }
}
