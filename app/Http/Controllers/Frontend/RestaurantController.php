<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RestaurantController extends Controller
{
    public function index(){

        return ;
    }


    public function search(Request $request){

        $this->validate(request(),[
            'restaurantName'=>'required | min:1'
        ]);

        $resto_name= Restaurant::where('name','like', '%'.$request->restaurantName.'%')->select('id','name')->get();

            //dd( $resto_name->toJson());

        return $resto_name->toJson();
    }

    public function searchByLoaction(Request $request){

        $radius=10;
        

        return ;
    }
}
