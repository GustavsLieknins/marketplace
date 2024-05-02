<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="title-div">
        <!-- <h1 class="title">Available cars</h1> -->
    </div>
   <div class="wrapper">
    <div class="content-div">

    @foreach($listings as $listing)
            <x-car-card :listing="$listing" :phone="$phone"/>
    @endforeach


        <a href="" class="card-a">
            <div class="card">
                <div class="card-img">
                    <img src="\img\Opel_Mokka.jpg" alt="hey">
                </div>
                <div class="card-text">
                    <h1 class="card-title">Title</h1>
                    <h1 class="card-price">1500€</h1>
                    <div class="card-info">
                        <div class="card-info-div">
                            <span class="info-first">Milage</span>
                            <span class="info-middle">Fuel</span>
                            <span class="info-last">Tilpums</span>
                        </div>
                        <div class="card-info-div">
                            <span class="info-first">Transmission</span>
                            <span class="info-last">Where</span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="" class="card-a">
            <div class="card">
                <div class="card-img">
                    <img src="\img\Opel_Mokka.jpg" alt="hey">
                </div>
                <div class="card-text">
                    <h1 class="card-title">Title</h1>
                    <h1 class="card-price">1500€</h1>
                    <div class="card-info">
                        <div class="card-info-div">
                            <span class="info-first">Milage</span>
                            <span class="info-middle">Fuel</span>
                            <span class="info-last">Tilpums</span>
                        </div>
                        <div class="card-info-div">
                            <span class="info-first">Transmission</span>
                            <span class="info-last">Where</span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="" class="card-a">
            <div class="card">
                <div class="card-img">
                    <img src="\img\Opel_Mokka.jpg" alt="hey">
                </div>
                <div class="card-text">
                    <h1 class="card-title">Title</h1>
                    <h1 class="card-price">1500€</h1>
                    <div class="card-info">
                        <div class="card-info-div">
                            <span class="info-first">Milage</span>
                            <span class="info-middle">Fuel</span>
                            <span class="info-last">Tilpums</span>
                        </div>
                        <div class="card-info-div">
                            <span class="info-first">Transmission</span>
                            <span class="info-last">Where</span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="" class="card-a">
            <div class="card">
                <div class="card-img">
                    <img src="\img\Opel_Mokka.jpg" alt="hey">
                </div>
                <div class="card-text">
                    <h1 class="card-title">Title</h1>
                    <h1 class="card-price">1500€</h1>
                    <div class="card-info">
                        <div class="card-info-div">
                            <span class="info-first">Milage</span>
                            <span class="info-middle">Fuel</span>
                            <span class="info-last">Tilpums</span>
                        </div>
                        <div class="card-info-div">
                            <span class="info-first">Transmission</span>
                            <span class="info-last">Where</span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="filter-div">
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
        <h1>Hey</h1>
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
