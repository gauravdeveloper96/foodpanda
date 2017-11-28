<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index(){
        //$restro = Restaurant::
        return ;
    }

    public function addRestro()
    {
        return view('backend.add_restro');
    }
}
