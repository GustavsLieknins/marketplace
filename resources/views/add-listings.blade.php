<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="title-div">
        <h1 class="title">Add listings</h1>
    </div>
    <div class="wrapper">
    <form method="POST" action="/create" enctype="multipart/form-data">
        @csrf
        <label>
            Title
            <input type="text" name="title">
        </label>
        <label>
            Description
            <input type="text" name="description">
        </label>
        <label>
            Model
            <input type="text" name="model">
        </label>
        <label>
            Price (Euro)
            <input type="number" name="price">
        </label>
        <label>
            Manufacture date
            <input type="date" name="manufacture_date">
        </label>
        <label>
            Mileage
            <input type="number" name="mileage">
        </label>
        <label>
            Color
            <input type="text" name="color">
        </label>
        <label>
            Technical inspection 
            <input type="date" name="teh_apskate">
        </label>
        <label>
            Image
            <input name="image_path" type="file" accept="image/*"/>
        </label>
        <label>
            Number plate
            <input type="text" name="num_plate">
        </label>
        <label>
            Vin number
            <input type="text" name="vin">
        </label>
        <label>
            Engine Volume
            <select name="engine_volume_id">
                <option value=""></option>
                @foreach ($engine_volumes as $engine_volume)
                    <option value="{{$engine_volume->id}}">{{ $engine_volume->engine_volume }}</option>
                @endforeach
            </select>
        </label>
        <label>
            Location
            <select name="location_id">
                <option value=""></option>
                @foreach ($locations as $location)
                    <option value="{{$location->id}}">{{ $location->location }}</option>
                @endforeach
            </select>
        </label>
        <label>
            Fuel
            <select name="fuel_id">
                <option value=""></option>
                @foreach ($fuels as $fuel)
                    <option value="{{$fuel->id}}">{{ $fuel->fuel }}</option>
                @endforeach
            </select>
        </label>
        <label>
            Transmission
            <select name="transmission_id">
                <option value=""></option>
                @foreach ($transmissions as $transmission)
                    <option value="{{$transmission->id}}">{{ $transmission->transmission }}</option>
                @endforeach
            </select>
        </label>
        <label>
            Brand
            <select name="brand_id">
                <option value=""></option>
                @foreach ($brands as $brand)
                    <option value="{{$brand->id}}">{{ $brand->brand }}</option>
                @endforeach
            </select>
        </label>
            <input type="hidden" name="created_by" value="{{ Auth::user()->id }}">

        
        <button>Add</button>
    </form>
  </div>
   <div class="footer-copyright">
   <div class="footer-copyright-wrapper">
   <div class="footer-content">
    <p class="footer-copyright-text">
            <a class="footer-copyright-link"> ©2024. | Designed By: Gustavs Lieknins. | All rights reserved. </a>
    </p>
   </div>
   </div>
   </div>
</x-app-layout>
