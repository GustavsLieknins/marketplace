<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="title-div">
        <h1 class="title">{{ $listing->title }}</h1>
    </div>
    <div class="wrapper">
        <div class="show-wrapper">
            <div class="img-wrapper">
                <img src="{{ $listing->image_path}}" alt="car-photo">
            </div>
            <div>
                <p class="description">{{ $listing->description }}</p>
                <h2 class="price">Price: {{ $listing->price }} €</h2>
                <p></p>
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
