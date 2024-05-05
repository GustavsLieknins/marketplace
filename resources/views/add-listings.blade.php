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
            <input type="text" name="title" value="{{ old('title') }}">
        </label>
        <label>
            Description
            <input type="text" name="description" value="{{ old('description') }}">
        </label>
        <label>
            Brand
            <select name="brand_id" onchange="this.form.method='post'; this.form.submit()">
                <option value=""></option>
                @foreach ($brands as $brand)
                    <option value="{{$brand->id}}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>{{ $brand->brand }}</option>
                @endforeach
            </select>
        </label>
        <label id="model-select-label">
            Model
            <select name="car_model_id">
                <option value=""></option>
                    @foreach ($models->where('brand_id', old('brand_id')) as $model)
                        <option value="{{$model->id}}" {{ old('car_model_id') == $model->id ? 'selected' : '' }}>{{ $model->car_model }}</option>
                    @endforeach
            </select>
        </label>
        <label>
            Price (Euro)
            <input type="number" name="price" value="{{ old('price') }}">
        </label>
        <label>
            Manufacture date
            <input type="date" name="manufacture_date" value="{{ old('manufacture_date') }}">
        </label>
        <label>
            Mileage
            <input type="number" name="mileage" value="{{ old('mileage') }}">
        </label>
        <label>
            Color
            <select name="color_id">
                <option value=""></option>
                @foreach ($colors as $color)
                    <option value="{{$color->id}}" {{ old('color_id') == $color->id ? 'selected' : '' }}>{{ $color->color }}</option>
                @endforeach
            </select>
        </label>
        <label>
            Technical inspection 
            <input type="date" name="teh_apskate" value="{{ old('teh_apskate') }}">
        </label>
        <label>
            Image
            <input name="image_path" type="file" accept="image/*" />
        </label>
        <label>
            Number plate
            <input type="text" name="num_plate" value="{{ old('num_plate') }}">
        </label>
        <label>
            Vin number
            <input type="text" name="vin" value="{{ old('vin') }}">
        </label>
        <label>
            Engine Volume
            <select name="engine_volume_id">
                <option value=""></option>
                @foreach ($engine_volumes as $engine_volume)
                    <option value="{{$engine_volume->id}}" {{ old('engine_volume_id') == $engine_volume->id ? 'selected' : '' }}>{{ $engine_volume->engine_volume }}</option>
                @endforeach
            </select>
        </label>
        <label>
            Location
            <select name="location_id">
                <option value=""></option>
                @foreach ($locations as $location)
                    <option value="{{$location->id}}" {{ old('location_id') == $location->id ? 'selected' : '' }}>{{ $location->location }}</option>
                @endforeach
            </select>
        </label>
        <label>
            Fuel
            <select name="fuel_id">
                <option value=""></option>
                @foreach ($fuels as $fuel)
                    <option value="{{$fuel->id}}" {{ old('fuel_id') == $fuel->id ? 'selected' : '' }}>{{ $fuel->fuel }}</option>
                @endforeach
            </select>
        </label>
        <label>
            Transmission
            <select name="transmission_id">
                <option value=""></option>
                @foreach ($transmissions as $transmission)
                    <option value="{{$transmission->id}}" {{ old('transmission_id') == $transmission->id ? 'selected' : '' }}>{{ $transmission->transmission }}</option>
                @endforeach
            </select>
        </label>

            <input type="hidden" name="created_by" value="{{ Auth::user()->id }}">

        
        <button>Add</button>
    </form>

    <br>
    <br>
    <br>


    @if ($errors->any())
    <ul  class="">
      @foreach ($errors->all() as $err)
          <li>{{ $err }}</li>
      @endforeach
    </ul>
  @endif
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





