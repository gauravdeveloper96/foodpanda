<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\RestaurantItem;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Models\FoodCategory;

class RestaurantItemController extends Controller
{

//    public function index(){
//
//        return view('backend.add_food_items');
//    }
    public function addFoodItems($restro_id)
    {

        $category = FoodCategory::pluck('food_category', 'id');
        return view('backend.add_food_items', compact('category', 'restro_id'));
    }

    public function store(Request $request)
    {
        //dd($request->toArray());
        $this->validate(request(),
            [

            'item-name' => 'required|min:3',
            'price' => 'required|min:1',
        ]);

        $restro_items = new RestaurantItem;

        $restro_items->item_name     = ucwords(request('item-name'));
        $restro_items->price         = request('price');
        $restro_items->restaurant_id = request('restro-id');
        $restro_items->category_id   = request('food-category');

//        dd($restro_items);
        $restro_items->save();

        return back();
    }

    public function edit($restro_item_id)
    {
        
        $restroItemsDetail = RestaurantItem::where('id', $restro_item_id)->first();
//         dd($restroItemsDetail->toArray());

        if (isset($restroItemsDetail)) {

            return view('backend.edit_food_item', compact('restroItemsDetail'));
        } else return back();
        //dd($restroDetail);
    }

    public function update($request, $restro_items_id)
    {
        $restroItemsDetail = RestaurantItem::find($restro_items_id);
        $this->validate(request(),
            [

            'item-name' => 'required|min:3',
            'price' => 'required|min:1',
        ]);
        //dd($request->toArray());

        if (isset($restroItemsDetail)) {

            $restroItemsDetail->item_name = ucwords($request->item-name);
            $restroItemsDetail->price     = $request->price;
            //dd($restroItemsDetail);

            $restroItemsDetail->save();

            $item = $restroItemsDetail->item_name;

            Session::flash('message',
                ucwords($item).' restaurant updated successfully!');

            Session::flash('alert-class', 'success');
        }

        else {
            Session::flash('message',
                'Whoops!'.ucwords($item).' restaurant update unsuccessful!');
            Session::flash('alert-class', 'danger');
        }

        $restro_items = Restaurant::find($restroItemsDetail->id);
        
//          $restro_items = RestaurantItem::where('id',$restro_id)->select('item_name', 'price')->get();
//            dd($restro_items->toArray());
        // $restroDetail = Restaurant::all();

        return view('backend.view_food_items', compact('restro_items'));

        //return view('backend.restaurant', compact('restroDetail'));
    }

    public function destroy($restro_item_id)
    {
//        $restro_id = RestaurantItem::
        RestaurantItem::where('id', $restro_item_id)->delete();
        $restro_items = Restaurant::find($restro_id);

        Session::flash('message', 'Item delete successful!');
        return view('backend.view_food_items', compact('restro_items'));
    }
}