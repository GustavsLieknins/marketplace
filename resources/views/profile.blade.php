<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="title-div">
        <h1 class="title">Ur listings</h1>
        </div>
   <div class="wrapper">
    @if ($listings == [])
            <div class="no-listings">
                <p>No listings, <a href="create-listing">Create one!</a></p>
            </div>
    @else
        <div class="listings-wrapper">
            <div class="create-listing-wrapper">
                <a href="create-listing" class="create-listing">Create listing</a>
            </div>
            @foreach($listings as $listing)
                    <x-car-card :listing="$listing" :users="$users" :brands="$brands"	:engine_volumes="$engine_volumes" :fuels="$fuels"  :locations="$locations" :transmissions="$transmissions"	/>
            @endforeach
        </div>
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
