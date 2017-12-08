<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Fileentry;
use App\Models\Restaurant;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{

    public function index()
    {

//        $restroDetail = Restaurant::select('id', 'name', 'address', 'img')->get();


        $restroDetail = Restaurant::has('fileentries')->with(['fileentries' => function($q) {
                        $q->select('id', 'filename', 'mime', 'original_filename');
                    }])
                ->select('id', 'name', 'address', 'fileentry_id')->get();

//        dd($restroDetail->toArray());

        return view('backend.restaurant', compact('restroDetail'));
    }

    public function create()
    {
        return view('backend.add_restro');
    }

    public function store(Request $request)
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
        $restro->name            = ucwords(request('restro-name'));
        $restro->address         = request('address');
        $restro->delivery_radius = request('radius');
        $restro->owner           = ucwords(request('owner'));
        $restro->Lat             = request('latitude');
        $restro->Long            = request('longitude');
        $restro->feature_restro  = request('feature');
        $restro->contact         = request('phone');

        //dd($restro);
//        if ($request->hasFile('image')) {
//
//
//            $image = $request->file('image');
//
//
//            $name = date('d-m-y-h-i-s-').preg_replace('/\s+/', '-',
//                    trim($image->getClientOriginalName()));
//
//            $destinationPath = public_path('/images');
//            $image->move($destinationPath, $name);
//            //$this->save();
//
//            $restro->img = $name;
//        }

        if ($request->hasFile('image')) {
            $file                     = $request->file('image');
            $extension                = $file->getClientOriginalExtension();
            Storage::disk('local')->put($file->getFilename().'.'.$extension,
                File::get($file));
            $entry                    = new Fileentry();
            $entry->mime              = $file->getClientMimeType();
            $entry->original_filename = $file->getClientOriginalName();
            $entry->filename          = $file->getFilename().'.'.$extension;

            $entry->save();

            $restro->fileentry_id = $entry->id;
        }


        $restro->save();
        // session()->flash('message', 'Restaurant added successfully!');
        return back();
    }

    public function show($restro_id)
    {
        //$restro_id=1;

        $category = Category::whereHas('Items',
                function($restro_items) use($restro_id) {
                $restro_items->where('restaurant_id', $restro_id);
            })->with(['Items' => function($query) use($restro_id) {
                    $query->where('restaurant_id', $restro_id);
                }])->get();




        //dd($category->toArray());
        //$restro_items = Restaurant::find($restro_id);
//          $restro_items = Item::where('id',$restro_id)->select('item_name', 'price')->get();
//            dd($restro_items->toArray());

        return view('backend.view_food_items', compact('category'));
    }

    public function edit($restro_id)
    {
        $restroDetail = Restaurant::find($restro_id);

        //dd($restroDetail);
        return view('backend.edit_restro', compact('restroDetail'));
    }

    public function update(Request $request, $restro_id)
    {
        $restroDetail = Restaurant::find($restro_id);
        $this->validate(request(),
            [

            'restro_name' => 'required|min:5',
            'address' => 'required|min:5',
            'radius' => 'required|min:1',
            'restro_owner' => 'required|min:3',
            'restro_contact' => 'required|min:7',
            'restroLat' => 'required',
            'restroLong' => 'required',
            'feature_restro' => 'required',
        ]);

        //dd($request->toArray());

        if (isset($restroDetail)) {

            $restroDetail->name            = ucwords(request('restro_name'));
            $restroDetail->address         = request('address');
            $restroDetail->delivery_radius = request('radius');
            $restroDetail->owner           = request('restro_owner');
            $restroDetail->Lat             = request('restroLat');
            $restroDetail->Long            = request('restroLong');
            $restroDetail->feature_restro  = request('feature_restro');
            $restroDetail->contact         = request('restro_contact');

            //dd($restro);
//            if ($request->hasFile('restro_img')) {
//
//
//                $image = $request->file('restro_img');
//
//
//                $name = date('d-m-y-h-i-s-').preg_replace('/\s+/', '-',
//                        trim($image->getClientOriginalName()));
//
//                $destinationPath = public_path('/images');
//                $image->move($destinationPath, $name);
//                //$this->save();
//
//                $restroDetail->img = $name;
//            }



            if ($request->hasFile('restro_img')) {
                $entry = Fileentry::find($restroDetail->fileentry_id);

                if (isset($entry)) {
                    $file                     = $request->file('restro_img');
                    $extension                = $file->getClientOriginalExtension();
                    Storage::disk('local')->put($file->getFilename().'.'.$extension,
                        File::get($file));
                    $entry->mime              = $file->getClientMimeType();
                    $entry->original_filename = $file->getClientOriginalName();
                    $entry->filename          = $file->getFilename().'.'.$extension;

                    $entry->save();
                }
            }


            $restroDetail->save();

            $restro = $restroDetail->name;

            Session::flash('message',
                ucwords($restro).' restaurant updated successfully!');
            // Session::flash('restro', $restro);
            Session::flash('alert-class', 'alert-success');
        } else {
            Session::flash('message',
                'Whoops!'.ucwords($restro).' restaurant update unsuccessful!');
            // Session::flash('restro', $restro);
            Session::flash('alert-class', 'alert-danger');
        }
        $restroDetail = Restaurant::all();

        return view('backend.restaurant', compact('restroDetail'));
    }

    public function destroy($restro_id)
    {
        $restroDetail = Restaurant::find($restro_id);
        Fileentry::where('id', $restroDetail->fileentry_id)->delete();

        Session::flash('message',
            ucwords($restroDetail->name).' restaurant deleted successfully!');
        
        Session::flash('alert-class', 'alert-success');

        return redirect()->route('admin.restaurants.index');
    }
}