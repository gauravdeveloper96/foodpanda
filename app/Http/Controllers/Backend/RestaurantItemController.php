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

        $category = FoodCategory::pluck('food_category','id');
        return view('backend.add_food_items', compact('category','restro_id'));
    }

    
    public function store(Request $request){
        //dd($request->toArray());
        $this->validate(request(),
            [

            'item-name' => 'required|min:3',
            'price' => 'required|min:1',
            
        ]);

        $restro_items = new RestaurantItem;

        $restro_items->item_name= ucwords(request('item-name'));
        $restro_items->price= request('price');
        $restro_items->restaurant_id= request('restro-id');
        $restro_items->category_id=  request('food-category');

//        dd($restro_items);
        $restro_items->save();

        return back();
    }

     public function edit($restro_item_id)
    {
//         dd($restro_item_id->toArray());
        $restroItemsDetail = RestaurantItem::where('id',$restro_item_id )->first();


        if(isset($restroItemsDetail)){

        return view('backend.edit_food_item',  compact('restroItemsDetail'));
        }
        else
            return back();
        //dd($restroDetail);
    }



    public function destroy($restro_item_id)
    {
        //$restro_id= RestaurantItem::
        RestaurantItem::where('id', $restro_item_id)->delete();
        $restro_items=Restaurant::find($restro_id);

        Session::flash('message', 'Item delete successful!');
        return view('backend.view_food_items', compact('restro_items'));

    }
}
