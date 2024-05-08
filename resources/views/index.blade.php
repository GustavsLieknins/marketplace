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
    <form action="/filter">
    @csrf
        <div class="filter-div">
            <select name="filter_engine_volume_id" id="" onchange="this.form.method='get'; this.form.submit()">
                <option value="/seas">Select engine volume</option>
                <option value="">Select value</option>
                    @foreach ($engineVolumes as $engine_volume)
                        <option value="{{$engine_volume->id}}" {{ old('engine_volume_id') == $engine_volume->id ? 'selected' : '' }}>{{ $engine_volume->engine_volume }}</option>
                    @endforeach
            </select>
        </div>
        <div class="filter-div">
            <select name="filter_location_id" id= "" onchange="this.form.method='post'; this.form.submit()">
                <option value="">Select location</option>
            </select>
        </div>
        <div class="filter-div">
            <select name="filter_fuel_id" id="" onchange="this.form.method='post'; this.form.submit()">
                <option value="">Select fuel</option>
            </select>
        </div>
        <div class="filter-div">
            <select name="filter_transmission_id" id="" onchange="this.form.method='post'; this.form.submit()">
                <option value="">Select</option>
        </select>
        </div>
        <div class="filter-div">
            <select name="filter_brand_id" id="" onchange="this.form.method='post'; this.form.submit()">>
                <option value="">Select</option>
            </select>
        </div>
        <div class="filter-div">
            <select name="filter_car_model_id" id="" onchange="this.form.method='post'; this.form.submit()">>
                <option value="">Select</option>
            </select>
        </div>
        <div class="filter-div">
            <select name="filter_color_id" id="" onchange="this.form.method='post'; this.form.submit()">>
                <option value="">Select</option>
            </select>
        </div>
        <div class="filter-div">
            <input type="text" placeholder="Filter by keyword" name="filer_keyword">
        </div>
        <div class="filter-div">
            <input type="number" placeholder="Filter by price" name="filer_price">
        </div>
        <div class="sub-but-div">
            <button>Submit</button>
        </div>
    </form>
    </div>
   </div>
   <div class="page-switch-wrapper">
        <div class="page-switch-div">
            {{ $listings->appends(['filter_engine_volume_id' => request('filter_engine_volume_id')])->links() }}
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
