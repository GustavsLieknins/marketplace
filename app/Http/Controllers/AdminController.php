<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

use App\Models\Listings;
use App\Models\User;

use App\Models\Brand;
use App\Models\Engine_volume;
use App\Models\Fuel;
use App\Models\Location;
use App\Models\Transmission;


class AdminController extends Controller
{
    public function index() {
        $users = User::all();
        
        // $color = Color::all();

        $brands = Brand::all();
        $engine_volumes = Engine_volume::all();
        $fuels = Fuel::all();
        $locations = Location::all();
        $transmissions = Transmission::all();

        $listings = Listings::latest()->paginate(5);

        $reports = Report::all();

        return view("admin", ["listings" => $listings, "users" => $users,"reports" => $reports, "brands" ,"brands" => $brands, "engine_volumes" => $engine_volumes, "fuels" => $fuels, "locations" => $locations, "transmissions" => $transmissions]);
    }

    public function reports() {
        
        $users = User::all();
        
        // $color = Color::all();

        $brands = Brand::all();
        $engine_volumes = Engine_volume::all();
        $fuels = Fuel::all();
        $locations = Location::all();
        $transmissions = Transmission::all();

        $reports = Report::all();
        $listings = Listings::whereIn('id', $reports->pluck('listing_id'))->latest()->paginate(5);



        return view("reports", ["listings" => $listings, "users" => $users,"reports" => $reports, "brands" ,"brands" => $brands, "engine_volumes" => $engine_volumes, "fuels" => $fuels, "locations" => $locations, "transmissions" => $transmissions]);
   
    }

    public function dismiss($id)
    {
        Report::where('listing_id', $id)->delete();

        return back();
    }
}
