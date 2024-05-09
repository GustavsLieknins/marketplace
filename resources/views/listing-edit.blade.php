<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @if ($errors->any())
    <ul style="">
      @foreach ($errors->all() as $err)
          <li>{{ $err }}</li>
      @endforeach
    </ul>
  @endif
    <form method="POST" action="/listing/{{ $listing->id }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
    <div class="wrapper">
        <div class="show-wrapper">
            <div class="img-wrapper">
                <div class="show-img-div">
                    <div class="show-title-div">
                        <h1 class="show-title"><textarea type="text" class="add-title-input" placeholder="Title" name="title">{{ old('title') ?? $listing->title }}</textarea></h1>
                        <p class="listed-on">Listed {{ $listing->created_at }}</p>
                    </div>
                    <div class="img-preview-div">
                        <img id="image_preview_img" class="image_preview" src="{{ $listing->image_path }}" alt="Image Preview">
                        <input type="file" class="image_input" id="image_input" onchange="displayImage(event)" name="image_path">
                    </div>
                </div>
            </div>
            <div class="show-text">
                <p class="description"><textarea type="text" class="add-title-input" placeholder="Description" name="description">{{ old('description') ?? $listing->description }}</textarea></p>
                <ul>
                    <li>
                        <span  class="car-info-first">Brand: <span class="car-info-info">
                            <select name="brand_id" class="add-select" onchange="this.form.method='post'; this.form.submit()">
                                <option value="{{ $listing->brand_id }}">{{ $brands[ $listing->brand_id - 1]->brand }}</option>
                                @foreach ($brands as $brand)
                                    <option value="{{$brand->id}}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>{{ $brand->brand }}</option>
                                @endforeach
                            </select>
                        </span></span>
                        <span  class="car-info-first">Model: <span class="car-info-info">
                            <select name="car_model_id">
                                <option value="{{ old('car_model_id') ? "" : $listing->car_model_id }}">{{ old('car_model_id') ? "" : $models[ $listing->car_model_id - 1]->car_model }}</option>
                                    @foreach ($models->where('brand_id', (old('brand_id') ?? $listing->brand_id)) as $model)
                                        <option value="{{$model->id}}" {{ old('car_model_id') == $model->id ? 'selected' : '' }}>{{ $model->car_model }}</option>
                                    @endforeach
                            </select>
                        </span></span>
                    </li>
                    <li>
                        <span>Year: <span class="car-info-info"><input type="date" class="add-text-input" placeholder="Click to add price" name="manufacture_date" value="{{ old('manufacture_date') ?? $listing->manufacture_date }}"></span></span>
                        <span>Mileage: <span class="car-info-info"><input type="text" class="add-text-input" placeholder="Mileage" name="mileage" value="{{ old('mileage') ?? $listing->mileage }}"> Km</span></span>
                    </li>
                    <li>
                        <span>Fuel type: <span class="car-info-info">
                        <select name="fuel_id">
                            <option value="{{ $listing->fuel_id }}">{{ $fuels[ $listing->fuel_id - 1]->fuel }}</option>
                            @foreach ($fuels as $fuel)
                                <option value="{{$fuel->id}}" {{ old('fuel_id') == $fuel->id ? 'selected' : '' }}>{{ $fuel->fuel }}</option>
                            @endforeach
                        </select>
                        </span></span>
                        <span>Engine volume: <span class="car-info-info">
                        <select name="engine_volume_id">
                            <option value="{{ $listing->engine_volume_id }}">{{ $engine_volumes[ $listing->engine_volume_id - 1]->engine_volume }}</option>
                            @foreach ($engine_volumes as $engine_volume)
                                <option value="{{$engine_volume->id}}" {{ old('engine_volume_id') == $engine_volume->id ? 'selected' : '' }}>{{ $engine_volume->engine_volume }}</option>
                            @endforeach
                        </select>
                        </span></span>
                    </li>
                    <li>
                        <span>Transmission: <span class="car-info-info">
                        <select name="transmission_id">
                            <option value="{{ $listing->transmission_id }}">{{ $transmissions[ $listing->transmission_id - 1]->transmission }}</option>
                            @foreach ($transmissions as $transmission)
                                <option value="{{$transmission->id}}" {{ old('transmission_id') == $transmission->id ? 'selected' : '' }}>{{ $transmission->transmission }}</option>
                            @endforeach
                        </select>
                        </span></span>
                        <span>Color: <span class="car-info-info">
                        <select name="color_id" class="add-select">
                            <option value="{{ $listing->color_id }}">{{ $colors[ $listing->color_id - 1]->color }}</option>
                                @foreach ($colors as $color)
                                    <option value="{{$color->id}}" {{ old('color_id') == $color->id ? 'selected' : '' }}>{{ $color->color }}</option>
                                @endforeach
                        </select>
                        </span></span>
                    </li>
                    <li>
                        <span>Number plate: <span class="car-info-info"><input type="text" class="add-text-input" placeholder="Number plate" name="num_plate" value="{{ old('num_plate') ?? $listing->num_plate }}"></span></span>
                        <span>Vin: <span class="car-info-info"><input type="text" class="add-text-input" placeholder="Vin" name="vin" value="{{ old('vin') ?? $listing->vin }}"></span></span>
                    </li>
                    <li>
                        <span>Teh: <span class="car-info-info"><input type="date" class="add-text-input" name="teh_apskate" value="{{ old('teh_apskate') ?? $listing->teh_apskate }}"></span></span>
                        <span>Location: <span class="car-info-info">
                        <select name="location_id">
                            <option value="{{ $listing->location_id }}">{{ $locations[ $listing->location_id - 1]->location }}</option>
                            @foreach ($locations as $location)
                                <option value="{{$location->id}}" {{ old('location_id') == $location->id ? 'selected' : '' }}>{{ $location->location }}</option>
                            @endforeach
                        </select>
                        </span></span>
                    </li>
                    <li>
                        <span class="car-info-last">Price: <span class="car-info-info car-info-price"><input type="text" class="add-text-input" placeholder="Price" name="price" value="{{ old('price') ?? $listing->price }}">€ </span></span>
                        <span class="car-info-last"></span>
                    </li>
                </ul>
                <div class="contact-wrapper">
                    <div class="contact-div">
                        <p class="contact-info">Phone number: {{ Auth::user()->phone_number }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <input type="hidden" name="created_by" value="{{ $listing->created_by }}">
        <input type="hidden" name="created_at" value="{{ $listing->created_at }}">
        <div class="add-car-button-div">
            <button type="submit" class="add-car-button">Save</button>
        </div>
        </form>
   <div class="footer-copyright">
   <div class="footer-copyright-wrapper">
   <div class="footer-content">
    <p class="footer-copyright-text">
            <a class="footer-copyright-link"> ©2024. | Designed By: Gustavs Lieknins. | All rights reserved. </a>
    </p>
   </div>
   </div>
   </div>
   <script>
       function displayImage(event) {
            if (event.target.files && event.target.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.querySelector('#image_preview_img').src = e.target.result;
                }
                reader.readAsDataURL(event.target.files[0]);
           }
       }
   </script>
</x-app-layout>
