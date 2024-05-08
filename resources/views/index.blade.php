<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="title-div">
        <h1 class="title">Available cars</h1>
        
    </div>
   <div class="wrapper">
    <div class="content-div">
        @foreach($listings as $listing)
            <x-car-card :listing="$listing" :users="$users" :brands="$brands"	:engineVolumes="$engineVolumes" :fuels="$fuels"  :locations="$locations" :transmissions="$transmissions"	/>
        @endforeach
    </div>
    <div class="filter-wrapper">
        <div class="title-filters-div">
            <p class="title-filters">Filters</p>
        </div>
    <form action="filter" method="GET">
    @csrf
        <div class="filter-div">
            <p>Engine volume</p>
            <select name="filter_engine_volume_id" id="" onchange="this.form.submit()">
                <option value="">Select value</option>
                @foreach ($engineVolumes as $engine_volume)
                    <option value="{{$engine_volume->id}}" {{ request('filter_engine_volume_id') == $engine_volume->id ? 'selected' : '' }}>{{ $engine_volume->engine_volume }}</option>
                @endforeach
            </select>
        </div>
        <div class="filter-div">
            <p>Location</p>
            <select name="filter_location_id" id="" onchange="this.form.submit()">
                <option value="">Select value</option>
                @foreach ($locations as $location)
                    <option value="{{$location->id}}" {{ request('filter_location_id') == $location->id ? 'selected' : '' }}>{{ $location->location }}</option>
                @endforeach
            </select>
        </div>
        <div class="filter-div">
            <p>Fuel</p>
            <select name="filter_fuel_id" id="" onchange="this.form.submit()">
                <option value="">Select value</option>
                @foreach ($fuels as $fuel)
                    <option value="{{$fuel->id}}" {{ request('filter_fuel_id') == $fuel->id ? 'selected' : '' }}>{{ $fuel->fuel }}</option>
                @endforeach
            </select>
        </div>
        <div class="filter-div">
            <p>Transmission</p>
            <select name="filter_transmission_id" id="" onchange="this.form.submit()">
                <option value="">Select value</option>
                @foreach ($transmissions as $transmission)
                    <option value="{{$transmission->id}}" {{ request('filter_transmission_id') == $transmission->id ? 'selected' : '' }}>{{ $transmission->transmission }}</option>
                @endforeach
            </select>
        </div>
        <div class="filter-div">
            <p>Brand</p>
            <select name="filter_brand_id" id="" onchange="this.form.submit()">
                <option value="">Select value</option>
                @foreach ($brands as $brand)
                    <option value="{{$brand->id}}" {{ request('filter_brand_id') == $brand->id ? 'selected' : '' }}>{{ $brand->brand }}</option>
                @endforeach
            </select>
        </div>
        <div class="filter-div">
            <p>Model</p>
            <select name="filter_car_model_id" id="" onchange="this.form.submit()">
                @if (request('filter_brand_id') != '')
                        <option value="">Select value</option>
                            @foreach ($models->where('brand_id', request('filter_brand_id')) as $model)
                                <option value="{{$model->id}}" {{ request('filter_car_model_id') == $model->id ? 'selected' : '' }}>{{ $model->car_model }}</option>
                            @endforeach
                            @else
                                <option value="">Select brand first</option>
                            @endif
            </select>
        </div>
        <div class="filter-div">
            <p>Color</p>
            <select name="filter_color_id" id="" onchange="this.form.submit()">
                <option value="">Select value</option>
                @foreach ($colors as $color)
                    <option value="{{$color->id}}" {{ request('filter_color_id') == $color->id ? 'selected' : '' }}>{{ $color->color }}</option>
                @endforeach
            </select>
        </div>
        <div class="filter-div">
            <p>Keyword(s)</p>
            <input type="text" placeholder="Type..." name="filer_keyword" value="{{ request('filer_keyword') }}">
        </div>
        <div class="filter-div">
            <p>Price under</p>
            <input type="number" placeholder="Type..." name="filer_price" value="{{ request('filer_price') }}">
        </div>
        <div class="sub-but-div">
            <button type="submit" class="filt-sub">Filter</button>
        </div>
    </form>
    </div>
   </div>
   <div class="page-switch-wrapper">
        <div class="page-switch-div">
            {{ $listings->appends(request()->all())->links() }}
        </div>
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


