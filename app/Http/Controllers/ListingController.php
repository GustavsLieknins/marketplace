<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Color;
use App\Models\Engine_volume;
use App\Models\Fuel;
use App\Models\Car_model;
use App\Models\Listings;
use App\Models\Location;
use App\Models\Transmission;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function create() {

        $models = Car_model::all();
        $colors = Color::all();
        $brands = Brand::all();
        $engine_volumes = Engine_volume::all();
        $fuels = Fuel::all();
        $locations = Location::all();
        $transmissions = Transmission::all();

        return view("add-listings", ["models" => $models, 'colors' => $colors, "brands" => $brands, "engine_volumes" => $engine_volumes, "fuels" => $fuels, "locations" => $locations, "transmissions" => $transmissions]);
    }

    public function store(Request $request)
    {
        if ($request->has('brand_id') && $request->car_model_id == null) {
            return back()->withInput($request->input());
        }
        $request->validate(
            [
                "title" => ["required", "min:3", "max:50"],
                "description" => ["required", "min:5", "max:255"],
                "price" => ["required", "numeric"],
                "manufacture_date" => ["required", "date"],
                "mileage" => ["required", "numeric"],
                "teh_apskate" => ["required", "date"],
                "image_path" => ["required", "image", "max:10240"],
                "num_plate" => ["required", "min:3", "max:50"],
                "vin" => ["required", "min:3", "max:100"],
                "color_id" => 'required|exists:App\Models\Color,id',
                "car_model_id" => 'required|exists:App\Models\Car_model,id',
                'engine_volume_id' => 'required|exists:App\Models\Engine_volume,id',
                'location_id' => 'required|exists:App\Models\Location,id',
                'fuel_id' => 'required|exists:App\Models\Fuel,id',
                'transmission_id' => 'required|exists:App\Models\Transmission,id',
                'brand_id' => 'required|exists:App\Models\Brand,id',
            ]
        );
        $listings = new Listings();
        $listings->title = $request->title;
        $listings->description = $request->description;
        $listings->car_model_id = $request->car_model_id;
        $listings->price = $request->price;
        $listings->manufacture_date = $request->manufacture_date;
        $listings->mileage = $request->mileage;
        $listings->color_id = $request->color_id;
        $listings->teh_apskate = $request->teh_apskate;
        $listings->num_plate = $request->num_plate;
        $listings->vin = $request->vin;

        $image_path = $request->file('image_path'); // storing img to variable

        // creating filename and saving the image
        $fileName = time() . '_' . $image_path->getClientOriginalName();
        $image_path->move(public_path('images'), $fileName);

        // storing filename to the database
        $listings->image_path = '/images/' . $fileName;

        $listings->engine_volume_id = $request->engine_volume_id;
        $listings->location_id = $request->location_id;
        $listings->fuel_id = $request->fuel_id;
        $listings->transmission_id = $request->transmission_id;
        $listings->brand_id = $request->brand_id;

        $listings->created_by = $request->created_by;

        $listings->save();

        return redirect("/index");
    }



    
    public function show($id) {

        
        $brands = Brand::all();
        $engine_volumes = Engine_volume::all();
        $fuels = Fuel::all();
        $locations = Location::all();
        $transmissions = Transmission::all();

        $listing = Listings::find($id);
        
        if (isset($listing)) {
            return view("listing-show", ["listing" => $listing, "brands" => $brands, "engine_volumes" => $engine_volumes, "fuels" => $fuels, "locations" => $locations, "transmissions" => $transmissions]);
        }

        return redirect("/index");
        // Uztaisīt skatu View vienam produktam un
        // izsaukt to no kontroliera
        
    }






}
