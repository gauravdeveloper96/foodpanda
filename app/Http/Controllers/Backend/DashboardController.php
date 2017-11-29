<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $restroDetail = Restaurant::select('id','restro_name', 'address','restro_img')->get();
        //dd($restro->toArray());
        return view('backend.dashboard', compact('restroDetail'));
    }
   
    
}
