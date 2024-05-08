<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;


use App\Models\Listings;
use App\Models\User;

use App\Models\Brand;
use App\Models\Engine_volume;
use App\Models\Fuel;
use App\Models\Location;
use App\Models\Transmission;

class IndexController extends Controller
{
    public function index(Request $request) {
        $listings = Listings::latest()->paginate(1);
        $users = User::all();
        
        // $color = Color::all();

        $brands = Brand::all();
        $engineVolumes = Engine_volume::all();
        $fuels = Fuel::all();
        $locations = Location::all();
        $transmissions = Transmission::all();

        return view("index", ["listings" => $listings, "users" => $users, "brands" => $brands, "engineVolumes" => $engineVolumes, "fuels" => $fuels, "locations" => $locations, "transmissions" => $transmissions]);
    }

    public function filter(Request $request) {
        $users = User::all();
        $brands = Brand::all();
        $engineVolumes = Engine_volume::all();

        if(isset($request->filter_engine_volume_id))
        {
            $listings = Listings::where('engine_volume_id', $request->filter_engine_volume_id)->latest()->paginate(1);
        }else
        { 
            $listings = Listings::latest()->paginate(1);
        }
    
        $fuels = Fuel::all();
        $locations = Location::all();
        $transmissions = Transmission::all();
    
        return view("index", ["listings" => $listings, "users" => $users, "brands" => $brands, "engineVolumes" => $engineVolumes, "fuels" => $fuels, "locations" => $locations, "transmissions" => $transmissions]);
    }
}




// if($request->has('filter_engine_volume_id')) {
//     $listings->where('engine_volume_id', $request->filter_engine_volume_id);
// }

// if($request->has('filter_location_id')) {
//     $listings->where('location_id', $request->filter_location_id);
// }

// if($request->has('filter_fuel_id')) {
//     $listings->where('fuel_id', $request->filter_fuel_id);
// }

// if($request->has('filter_transmission_id')) {
//     $listings->where('transmission_id', $request->filter_transmission_id);
// }

// if($request->has('filter_brand_id')) {
//     $listings->where('brand_id', $request->filter_brand_id);
// }

// if($request->has('filter_car_model_id')) {
//     $listings->where('car_model_id', $request->filter_car_model_id);
// }

// if($request->has('filter_color_id')) {
//     $listings->where('color_id', $request->filter_color_id);
// }

// if($request->has('filer_keyword')) {
//     $listings->where('description', 'LIKE', '%' . $request->filer_keyword . '%');
// }

// if($request->has('filer_price') && !empty($request->filer_price)) {
//     $listings->where('price', '<=', $request->filer_price);
// }

// $listings = $listings->paginate(1)->appends($request->all());