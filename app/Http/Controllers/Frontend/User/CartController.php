<?php

namespace App\Http\Controllers\Frontend\User;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function index(){

        return ;
    }

    public function addToCart(Request $request){

        $isAdmin= User::where('id',auth()->user()->id)->select('id','email')->first();

        if($isAdmin['email']=='executive@executive.com'){

            $this->authorize('addToCart', Cart::class);

            return back();
        }
        else
            return;
    }
}
