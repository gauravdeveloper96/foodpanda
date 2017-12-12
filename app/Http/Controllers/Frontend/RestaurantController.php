<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Item;
use App\Models\Fileentry;
use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RestaurantController extends Controller
{

    public function index()
    {

        return;
    }

    public function search(Request $request)
    {

        $this->validate(request(),
            [
            'restaurantName' => 'required | min:1'
        ]);

        $resto_name = Restaurant::where('feature_restro', 1)->where('name',
                'like', '%'.$request->restaurantName.'%')->has('Items')->select('id',
                'name')->get();



        return $resto_name->toJson();
    }

    public function searchByLocation(Request $request)
    {
        $radius = 10;

        $this->validate(request(),
            [
            'lat' => 'required | min:1',
            'lng' => 'required | min:1'
        ]);

        //All category//

        $category = Category::select('id', 'category')->groupBy('category')->get();
//        dd($category->toArray());

        $haversine = "( 6371 * acos( cos( radians(".$request->lat.") ) * cos( radians( lat ) ) * cos( radians( lng ) - radians(".$request->lng.") ) + sin( radians(".$request->lat.") ) * sin( radians( lat ) ) ) )";

        $restro = Restaurant::where('feature_restro', 1)->has('fileentries')
            ->with(['fileentries' => function($q) {
                    $q->select('id', 'filename', 'mime', 'original_filename');
                }])
            ->has('Items')
            ->with(['Items' => function($items) {
                    $items->select('id', 'restaurant_id', 'category_id')
                    ->with(['category' => function($cat) {
                            $cat->select('id', 'category');
                        }]);
                }])
                ->select('id', 'name', 'fileentry_id')
                ->selectRaw("{$haversine} AS distance")
                ->whereRaw("{$haversine} < ?", [$radius])
                ->get();

            $count = $restro->count();

            $restro->transform(function ($restroSingle, $key) {
                $restroSingle->groupedItems = $restroSingle->Items->groupBy('category_id')->toArray();
                return $restroSingle;
            });

            return view('frontend.RestaurantList',
                compact('restro', 'category', 'count'));
        }

        public function viewMenu($restro_id)
        {
            $items = Item::where('restaurant_id', $restro_id)
                ->select('id', 'name')
                ->first();
            if (isset($items)) {

                $RestroMenu = Restaurant::where('feature_restro', 1)->where('id',$restro_id)->has('fileentries')
                    ->with(['fileentries' => function($q) {
                            $q->select('id', 'filename', 'mime',
                                'original_filename');
                        }])
                    ->has('Items')
                    ->with(['Items' => function($items) {
                            $items->select('id','name','price', 'restaurant_id', 'category_id')
                            ->with(['category' => function($cat) {
                                    $cat->select('id', 'category');
                                }]);
                        }])
                        ->select('id', 'name', 'fileentry_id')
                        ->get();

                    $RestroMenu->transform(function ($restroSingle, $key) {
                        $restroSingle->groupedItems = $restroSingle->Items->groupBy('category_id')->toArray();
                        return $restroSingle;
                    });

//                    dd($RestroMenu->toArray());

                    if (isset($RestroMenu)) {
                        $RestroCat = Category::whereHas('Items',
                                function($query) use($restro_id) {
                                $query->where('restaurant_id', $restro_id);
                            })
                            ->with(['Items' => function($q) {
                                    $q->select('id', 'name', 'category_id')
                                    ->groupBy('name');
                                }])
                            ->select('id', 'category')
                            ->groupBy('category')
                            ->get();
//                    dd($RestroCat->toArray());
                    }



                    return view('frontend.RestaurantMenu',
                        compact('RestroMenu', 'RestroCat'));
                } else return back();
            }
        }