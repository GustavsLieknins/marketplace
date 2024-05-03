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
        $listings = Listings::all();
        $users = User::all();
        
        // $color = Color::all();

        $brands = Brand::all();
        $engineVolumes = Engine_volume::all();
        $fuels = Fuel::all();
        $locations = Location::all();
        $transmissions = Transmission::all();

        // if(!isset($listings))
        // {
        //     $listings = [];
        // }

        return view("index", ["listings" => $listings, "users" => $users, "brands" => $brands, "engineVolumes" => $engineVolumes, "fuels" => $fuels, "locations" => $locations, "transmissions" => $transmissions]);
    }
}
