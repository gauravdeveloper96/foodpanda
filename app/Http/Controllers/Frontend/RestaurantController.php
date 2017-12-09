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

        $resto_name = Restaurant::where('name', 'like',
                '%'.$request->restaurantName.'%')->select('id', 'name')->get();

        //dd( $resto_name->toJson());

        return $resto_name->toJson();
    }

    public function searchByLocation(Request $request)
    {
        $radius = 10;

        //All category//

        $category = Category::select('id', 'category')->groupBy('category')->get();
//        dd($category->toArray());

        $haversine = "( 6371 * acos( cos( radians(".$request->lat.") ) * cos( radians( lat ) ) * cos( radians( lng ) - radians(".$request->lng.") ) + sin( radians(".$request->lat.") ) * sin( radians( lat ) ) ) )";
//        $restro  = Restaurant::select('id', 'name', 'lat', 'lng')
//            ->selectRaw("{$haversine} AS distance")
//            ->whereRaw("{$haversine} < ?", [$radius])
//            ->get();

        $restro = Restaurant::has('fileentries')
            ->with(['fileentries' => function($q) {
                    $q->select('id', 'filename', 'mime', 'original_filename');
                }])
            ->has('Items')
//            ->with('Items')
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

            $restro->transform(function ($restroSingle, $key) {
                $restroSingle->groupedItems = $restroSingle->Items->groupBy('category_id')->toArray();
                return $restroSingle;
            });

            
//            dd($restro->toArray());

            return view('frontend.RestaurantList', compact('restro', 'category'));
        }

        public function ViewMenu($restro_id)
        {
            return ;
        }
    }