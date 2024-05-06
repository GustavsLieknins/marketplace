<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="wrapper">
        <div class="show-wrapper">
            <div class="img-wrapper">
                <div class="show-img-div">
                    <div class="show-title-div">
                        <h1 class="show-title">{{ $listing->title }}</h1>
                        <p class="listed-on">Listed {{ $listing->created_at }}</p>
                    </div>
                    <img src="{{ $listing->image_path}}" alt="car-photo">
                </div>
            </div>
            <div class="show-text">
                <p class="description">{{ $listing->description }}</p>
                <ul>
                    <li>
                        <span  class="car-info-first">Brand: <span class="car-info-info">{{ $brands[$listing->brand_id - 1]->brand }}</span></span>
                        <span  class="car-info-first">Model: <span class="car-info-info">{{ $models[$listing->car_model_id - 1]->car_model }}</span></span>
                    </li>
                    <li>
                        <span>Year: <span class="car-info-info">{{ $listing->manufacture_date }}</span></span>
                        <span>Mileage: <span class="car-info-info">{{ $listing->mileage }} Km</span></span>
                    </li>
                    <li>
                        <span>Fuel type: <span class="car-info-info">{{ $fuels[$listing->fuel_id - 1]->fuel }}</span></span>
                        <span>Engine volume: <span class="car-info-info">{{ $engine_volumes[$listing->engine_volume_id - 1]->engine_volume }}</span></span>
                    </li>
                    <li>
                        <span>Transmission: <span class="car-info-info">{{ $transmissions[$listing->transmission_id - 1]->transmission }}</span></span>
                        <span>Color: <span class="car-info-info">{{ $colors[$listing->color_id - 1]->color }}</span></span>
                    </li>
                    <li>
                        <span>Num plate: <span class="car-info-info">{{ $listing->num_plate }}</span></span>
                        <span>Vin: <span class="car-info-info">{{ $listing->vin }}</span></span>
                    </li>
                    <li>
                        <span>Teh: <span class="car-info-info">{{ $listing->teh_apskate ? $listing->teh_apskate : 'No teh inspection' }}</span></span>
                        <span>Location: <span class="car-info-info">{{ $locations[$listing->location_id - 1]->location }}</span></span>
                    </li>
                    <li>
                        <span class="car-info-last">Price: <span class="car-info-info car-info-price">{{ $listing->price }} € </span></span>
                        <span class="car-info-last"></span>
                    </li>
                </ul>
                <div class="contact-wrapper">
                    <div class="contact-div">
                        <p class="contact-info">Phone number: {{ $users[$listing->created_by - 1]->phone_number }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @auth
        <div class="show-listedon-wrapper">
            <div class="show-listedon-div">
                <form action="/report/{{ $listing->id }}" method="POST">
                @csrf
                    <input type="hidden" name="created_by" value="{{ Auth::user()->id }}">
                    <button class="show-listedon-text">Report</button>
                </form>
            </div>
        </div>
    @endauth
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
