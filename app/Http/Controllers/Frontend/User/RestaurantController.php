<?php

namespace App\Http\Controllers\Frontend\User;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RestaurantController extends Controller
{
    public function index(){

        return ;
    }
    public function search(Request $request){

        $resto_name= Restaurant::where('name','like', '%'.$request->restaurantName.'%')->select('name')->get();

            //dd( $resto_name->toJson());

        return $resto_name->toJson();
    }
}
