<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\Restaurant;
use App\Models\RestaurantItem;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index(){
        
        $restroDetail = Restaurant::select('id','restro_name', 'address','restro_img')->get();
//        dd($restro->toArray());
        return view('backend.restaurant', compact('restroDetail'));
       
    }

    public function show($restro_id)
    {
            $restro_items=Restaurant::find($restro_id);
//          $restro_items = RestaurantItem::where('id',$restro_id)->select('item_name', 'price')->get();
//            dd($restro_items->toArray());

        return view('backend.view_food_items', compact('restro_items'));
    }

    public function create()
    {
        return view('backend.add_restro');
    }

    public function store(Request $request)
    {
        $this->validate(request(),
            [

            'restro-name' => 'required|min:5',
            'address' => 'required|min:5',
            'radius' => 'required',
            'owner' => 'required|min:3',
            'phone' => 'required|min:7',
            'latitude' => 'required',
            'longitude' => 'required',
            'feature' => 'required',
        ]);
        //dd($request->toArray());

        $restro                  = new Restaurant;
        $restro->restro_name     = ucwords(request('restro-name'));
        $restro->address         = request('address');
        $restro->delivery_radius = request('radius');
        $restro->restro_owner    = ucwords(request('owner'));
        $restro->restroLat       = request('latitude');
        $restro->restroLong      = request('longitude');
        $restro->feature_restro  = request('feature');
        $restro->restro_contact  = request('phone');

        //dd($restro);


        if ($request->hasFile('image')) {


            $image = $request->file('image');


            $name = date('d-m-y-h-i-s-').preg_replace('/\s+/', '-',
                    trim($image->getClientOriginalName()));

            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            //$this->save();

            $restro->restro_img = $name;
        }


        $restro->save();
       // session()->flash('message', 'Restaurant added successfully!');
        return back();
    }

    public function edit($restro_id)
    {
        $restroDetail = Restaurant::find($restro_id);

        //dd($restroDetail);
        return view('backend.edit_restro', compact('restroDetail'));
    }

    public function update(Request $request, $restro_id)
    {
        $restroDetail = Restaurant::find($restro_id);
        $this->validate(request(),
            [

            'restro_name' => 'required|min:5',
            'address' => 'required|min:5',
            'radius' => 'required|min:1',
            'restro_owner' => 'required|min:3',
            'restro_contact' => 'required|min:7',
            'restroLat' => 'required',
            'restroLong' => 'required',
            'feature_restro' => 'required',
        ]);
        //dd($request->toArray());

        if (isset($restroDetail)) {

            $restroDetail->restro_name     = ucwords(request('restro_name'));
            $restroDetail->address         = request('address');
            $restroDetail->delivery_radius = request('radius');
            $restroDetail->restro_owner    = request('restro_owner');
            $restroDetail->restroLat       = request('restroLat');
            $restroDetail->restroLong      = request('restroLong');
            $restroDetail->feature_restro  = request('feature_restro');
            $restroDetail->restro_contact  = request('restro_contact');

            //dd($restro);


            if ($request->hasFile('image')) {


                $image = $request->file('image');


                $name = date('d-m-y-h-i-s-').preg_replace('/\s+/', '-',
                        trim($image->getClientOriginalName()));

                $destinationPath = public_path('/images');
                $image->move($destinationPath, $name);
                //$this->save();

                $restroDetail->restro_img = $name;
            }


            $restroDetail->save();

            $restro = $restroDetail->restro_name;

            Session::flash('message', ucwords($restro).' restaurant updated successfully!');
            // Session::flash('restro', $restro);
            Session::flash('alert-class', 'alert-danger');
        }

        else{
             Session::flash('message','Whoops!'. ucwords($restro).' restaurant update unsuccessful!');
            // Session::flash('restro', $restro);
            Session::flash('alert-class', 'success');
        }
        $restroDetail = Restaurant::all();
        
        return view('backend.restaurant', compact('restroDetail'));
    }
    

    public function destroy($restro_id)
    {

        Restaurant::where('id', $restro_id)->delete();
        $restroDetail = Restaurant::select('id', 'restro_name', 'address',
                'restro_img')->get();

        
        return view('backend.restaurant', compact('restroDetail'));
    }
}