<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Item;
use App\Models\Category ;
use App\Models\Restaurant;
use App\Models\Access\User\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class OrdersController extends Controller
{

    public function index()
    {
        $id     = 1;
        $orders = Order::where('restaurant_id', $id)->whereBetween('total_amount',
                [400, 500])->get();
//        dd($orders->toArray());


        $order = Order::where('user_id', 3)
                ->select('restaurant_id',  \DB::raw('count(*) as total'))
                ->groupBy('restaurant_id')
                ->orderBy('total', 'DESC')
                ->with(['restaurants'=>function($restro_name){
                    $restro_name->select('name','id')->first();}])
                ->first();

                    
//       dd($order->toArray());

        

         $orderItems = OrderItem::whereHas('orders', function($query) use($id){
             $query->where('restaurant_id', $id);})
                 ->select('id', 'item_id', \DB::raw('sum(quantity) as count'))
                ->groupBy('item_id')
                ->orderBy('count', 'desc')
                ->with(['Items'=>function($item){
                    $item->select('name','id')->get();}])
                ->first();


//         dd($orderItems->toArray());


//
//         $category_id=2;
//         $sdate=Carbon::now()->startOfMonth()->subMonth(2);
////         dd($sdate);
//         $edate =Carbon::now()->startOfMonth();
//
//         $popitem= Category::whereHas('Items', function($item) use($category_id){
//             $item->where('category_id', $category_id);
//         })->with(['Items'])->get();
//         dump($popitem->toArray());
//         ->whereBetween('updated_at',[$sdate,$edate])



         $items=  OrderItem::select('id','item_id',\DB::raw('sum(quantity) as count'))
                            ->groupBy('item_id')
                            ->orderBy('count', 'desc')
                            ->havingRaw('SUM(quantity) >= 100')
                            ->with('items')
                            ->get();

//         dump($items->toArray());


         $resto=Order::whereBetween('created_at',['2017-08-00','2017-08-31'])
                       ->select('id','restaurant_id',\DB::raw('sum(total_amount) as count'),\DB::raw('count(*) as total'))
                       ->groupBy('restaurant_id')
                       ->orderBy('count', 'desc')->with(['restaurants'=>function($name){
                           $name->select('name','id')->get();
                       }])
         //}])
             ->first();
                       //->with(['orderItem'=>function($item){
                      // $item->whereBetween('created_at',['2017-8-00','2017-8-31']);

                      // select('restaurant_id',  \DB::raw('count(*) as total'))
//          dump($resto->toArray());

         

          

          $user=User::where('id',3)->select('id','first_name','dob')->first();
//          dump($user->toArray());

    }
}