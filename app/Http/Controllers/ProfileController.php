<?php

namespace App\Http\Controllers;

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

class ProfileController extends Controller
{
    public function index() {
        $listings_notsoreted = Listings::all();
        $users = User::all();
        
        // $color = Color::all();

        $brands = Brand::all();
        $engine_volumes = Engine_volume::all();
        $fuels = Fuel::all();
        $locations = Location::all();
        $transmissions = Transmission::all();

        foreach ($listings_notsoreted as $listing) {
            if($listing->created_by == Auth::user()->id) {
                $listings[] = $listing;
            }
        }
        if(!isset($listings))
        {
            $listings = [];
        }


        return view("profile", ["listings" => $listings, "users" => $users, "brands" => $brands, "engine_volumes" => $engine_volumes, "fuels" => $fuels, "locations" => $locations, "transmissions" => $transmissions]);
    }

}
