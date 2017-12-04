<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\Item;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Models\Category;

class ItemController extends Controller
{

//    public function index(){
//
//        return view('backend.add_food_items');
//    }
    public function addFoodItems($restro_id)
    {

        $category = Category::pluck('category', 'id');
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

        $restro_items = new Item;

        $restro_items->name     = ucwords(request('item-name'));
        $restro_items->price         = request('price');
        $restro_items->restaurant_id = request('restro-id');
        $restro_items->category_id   = request('food-category');

//        dd($restro_items);
        $restro_items->save();

        $restro_id=$restro_items->restaurant_id;
        $restro_name = Restaurant::select('name')->first($restro_items->restaurant_id);
        
        $item=$restro_items->name;
        
        Session::flash('message', ucwords($item).' item successfully added to '. ucwords($restro_name->name.'.' ));

        return back();
    }

    public function edit($restro_item_id)
    {

        $restroItemsDetail = Item::where('id', $restro_item_id)->first();
//         dd($restroItemsDetail->toArray());

        if (isset($restroItemsDetail)) {

            return view('backend.edit_food_item', compact('restroItemsDetail'));
        } else return back();
        //dd($restroDetail);
    }

    public function update(Request $request, $restro_items_id)
    {
        $restroItemsDetail = Item::find($restro_items_id);
        $this->validate(request(),
            [

            'item_name' => 'required|min:3',
            'price' => 'required|min:1',
        ]);
        //dd($request->toArray());

        if (isset($restroItemsDetail)) {

            $restroItemsDetail->name = ucwords($request->item_name);
            $restroItemsDetail->price     = $request->price;
            //dd($restroItemsDetail);

            $restroItemsDetail->save();

            $item = $restroItemsDetail->name;

            Session::flash('message', ucwords($item).' updated successfully!');

            Session::flash('alert-class', 'alert-success');
        } else {
            Session::flash('message',
                'Whoops!'.ucwords($item).' restaurant update unsuccessful!');
            Session::flash('alert-class', 'danger');
        }


        $restro_items = Restaurant::find($restroItemsDetail->restaurant_id);

//          $restro_items = Item::where('id',$restro_id)->select('name', 'price')->get();
//            dd($restro_items->toArray());
        // $restroDetail = Restaurant::all();

       // return view('backend.view_food_items', compact('restro_items'));
        return redirect()->route('admin.restaurants.show', [$restroItemsDetail->restaurant_id]);
    }

    public function destroy($restro_item_id)
    {
        $restro_id = Item::find($restro_item_id);

        $category= Category::find($restro_id->category_id);
//        dd($category);

        $name=$category->category;
        $item=$restro_id->name;

        Item::where('id', $restro_item_id)->delete();

        $restro_id=$restro_id->restaurant_id;


      

//        $restro_items = Restaurant::find($restro_id->restaurant_id);

        Session::flash('message',ucfirst(strtolower($item)). ' item successfully deleted from '.strtolower($name).' category.');

//        return view('backend.view_food_items', compact('restro_items'));

        return redirect()->route('admin.restaurants.show', [$restro_id]);
    }
}