<?php

namespace App\Http\Controllers\Frontend\User;

use App\Models\Access\User\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function index(){

        return ;
    }

    public function addToCart($item_id){

        $isAdmin= User::where('id',auth()->user()->id)->select('id','email')->first();

        if($isAdmin['email']=='executive@executive.com'){

            $this->authorize('addToCart', Cart::class);

            return back();
        }
        if(Auth::check()){

            $item =Item::where('id',$item_id)
                ->select('id','name','restaurant_id','category_id','price')
                ->first();
            $quant=1;
            $item=  array_push($item,$quant );
//            $item['price']=$item['price']*4;


            if(empty(session('addToCart'))){
                session()->put('addToCart',[$item]);
                 $tprice= $item['price'];
                 //dd('11');
                return json_encode(session('addToCart'), $tprice);
            }
            else {
                session()->push('addToCart',$item);
//                dd(session('addToCart'));
               $tprice=0;
                foreach (session('addToCart') as $total){
                    $tprice+=$total['price'];
                }

                return json_encode(session('addToCart'), $tprice);

            }

        }
        else
            return response()->json(['route' => route('login')],500);
    }
}
