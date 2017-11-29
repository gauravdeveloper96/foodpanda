<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{

    public function index()
    {
        //$restro = Restaurant::
        return;
    }

    public function addRestro()
    {
        return view('backend.add_restro');
    }

    public function storeRestro(Request $request)
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
        $restro->restro_name     = request('restro-name');
        $restro->address         = request('address');
        $restro->delivery_radius = request('radius');
        $restro->restro_owner    = request('owner');
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


        return back();
    }
}