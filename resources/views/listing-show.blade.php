<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="show-listedon-wrapper">
        <div class="show-listedon-div">
            <p class="show-listedon-text">Date {{ $listing->created_at }}</p>
        </div>
    </div>
    <div class="wrapper">
        <div class="show-wrapper">
            <div class="img-wrapper">
                <div class="show-img-div">
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
                        <span>Number plate: <span class="car-info-info">{{ $listing->num_plate }}</span></span>
                        <span>Vin: <span class="car-info-info">{{ $listing->vin }}</span></span>
                    </li>
                    <li>
                        <span>Technical inspection: <span class="car-info-info">{{ $listing->teh_apskate }}</span></span>
                        <span>Location: <span class="car-info-info">{{ $locations[$listing->location_id - 1]->location }}</span></span>
                    </li>
                    <li>
                        <span class="car-info-last">Price: <span class="car-info-info car-info-price">{{ $listing->price }} € </span></span>
                        <span class="car-info-last"></span>
                    </li>
                </ul>
            </div>
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
