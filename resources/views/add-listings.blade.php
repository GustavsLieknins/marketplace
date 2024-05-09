<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <form method="POST" action="/create" enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
            <div class="validation">
            @foreach ($errors->all() as $err)
            {{ $err }}<br>
            @endforeach
            </div>
        @endif
    <div class="wrapper">
        <div class="show-wrapper">
            <div class="img-wrapper">
                <div class="show-img-div">
                    <div class="show-title-div">
                        <h1 class="show-title"><textarea type="text" class="add-title-input" placeholder="Title" name="title">{{ old('title') }}</textarea></h1>
                        <p class="listed-on">Listed {{ date('Y-m-d H:i:s') }}</p>
                    </div>
                    <div class="img-preview-div">
                        <img id="image_preview_img" class="image_preview" src="img\Click to add image.png" alt="Image Preview">
                        <input type="file" class="image_input" id="image_input" onchange="displayImage(event)" name="image_path">
                    </div>
                </div>
            </div>
            <div class="show-text">
                <p class="description"><textarea type="text" class="add-title-input" placeholder="Description" name="description">{{ old('description') }}</textarea></p>
                <ul>
                    <li>
                        <span  class="car-info-first">Brand: <span class="car-info-info">
                            <select name="brand_id" class="add-select" onchange="this.form.method='post'; this.form.submit()">
                                <option value="">Select value</option>
                                @foreach ($brands as $brand)
                                    <option value="{{$brand->id}}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>{{ $brand->brand }}</option>
                                @endforeach
                            </select>
                        </span></span>
                        <span  class="car-info-first">Model: <span class="car-info-info">
                            @if (old('brand_id') != '')
                            <select name="car_model_id">
                                <option value="">Select value</option>
                                    @foreach ($models->where('brand_id', old('brand_id')) as $model)
                                        <option value="{{$model->id}}" {{ old('car_model_id') == $model->id ? 'selected' : '' }}>{{ $model->car_model }}</option>
                                    @endforeach
                            </select>
                            @else
                            <select name="car_model_id">
                                <option value="">Select brand first</option>
                            </select>
                            @endif
                        </span></span>
                    </li>
                    <li>
                        <span>Year: <span class="car-info-info"><input type="date" class="add-text-input" placeholder="Click to add price" name="manufacture_date" value="{{ old('manufacture_date') }}"></span></span>
                        <span>Mileage: <span class="car-info-info"><input type="text" class="add-text-input" placeholder="Mileage" name="mileage" value="{{ old('mileage') }}"> Km</span></span>
                    </li>
                    <li>
                        <span>Fuel type: <span class="car-info-info">
                        <select name="fuel_id">
                            <option value="">Select value</option>
                            @foreach ($fuels as $fuel)
                                <option value="{{$fuel->id}}" {{ old('fuel_id') == $fuel->id ? 'selected' : '' }}>{{ $fuel->fuel }}</option>
                            @endforeach
                        </select>
                        </span></span>
                        <span>Engine volume: <span class="car-info-info">
                        <select name="engine_volume_id">
                            <option value="">Select value</option>
                            @foreach ($engine_volumes as $engine_volume)
                                <option value="{{$engine_volume->id}}" {{ old('engine_volume_id') == $engine_volume->id ? 'selected' : '' }}>{{ $engine_volume->engine_volume }}</option>
                            @endforeach
                        </select>
                        </span></span>
                    </li>
                    <li>
                        <span>Transmission: <span class="car-info-info">
                        <select name="transmission_id">
                            <option value="">Select value</option>
                            @foreach ($transmissions as $transmission)
                                <option value="{{$transmission->id}}" {{ old('transmission_id') == $transmission->id ? 'selected' : '' }}>{{ $transmission->transmission }}</option>
                            @endforeach
                        </select>
                        </span></span>
                        <span>Color: <span class="car-info-info">
                        <select name="color_id" class="add-select">
                            <option value="">Select value</option>
                                @foreach ($colors as $color)
                                    <option value="{{$color->id}}" {{ old('color_id') == $color->id ? 'selected' : '' }}>{{ $color->color }}</option>
                                @endforeach
                        </select>
                        </span></span>
                    </li>
                    <li>
                        <span>Number plate: <span class="car-info-info"><input type="text" class="add-text-input" placeholder="Number plate" name="num_plate" value="{{ old('num_plate') }}"></span></span>
                        <span>Vin: <span class="car-info-info"><input type="text" class="add-text-input" placeholder="Vin" name="vin" value="{{ old('vin') }}"></span></span>
                    </li>
                    <li>
                        <span>Teh: <span class="car-info-info"><input type="date" class="add-text-input" name="teh_apskate" value="{{ old('teh_apskate') }}"></span></span>
                        <span>Location: <span class="car-info-info">
                        <select name="location_id">
                            <option value="">Select value</option>
                            @foreach ($locations as $location)
                                <option value="{{$location->id}}" {{ old('location_id') == $location->id ? 'selected' : '' }}>{{ $location->location }}</option>
                            @endforeach
                        </select>
                        </span></span>
                    </li>
                    <li>
                        <span class="car-info-last">Price: <span class="car-info-info car-info-price"><input type="text" class="add-text-input" placeholder="Price" name="price" value="{{ old('price') }}">€ </span></span>
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
        <input type="hidden" name="created_by" value="{{ Auth::user()->id }}">
        <div class="add-car-button-div">
            <button type="submit" class="add-car-button">Add</button>
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
