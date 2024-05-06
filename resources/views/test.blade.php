<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <form id="image_upload_form" enctype="multipart/form-data">
    @csrf
    <div class="wrapper">
        <div class="show-wrapper">
            <div class="img-wrapper">
                <div class="show-img-div">
                    <div class="show-title-div">
                        <h1 class="show-title"><textarea type="text" class="add-title-input" placeholder="Title"></textarea></h1>
                        <p class="listed-on">Listed {{ date('Y-m-d H:i:s') }}</p>
                    </div>
                    <div class="img-preview-div">
                        <img id="image_preview_img" class="image_preview" src="img\Click to add image.png" alt="Image Preview">
                        <input type="file" class="image_input" id="image_input" onchange="displayImage(event)">
                    </div>
                </div>
            </div>
            <div class="show-text">
                <p class="description"></p>
                <ul>
                    <li>
                        <span  class="car-info-first">Brand: <span class="car-info-info"></span></span>
                        <span  class="car-info-first">Model: <span class="car-info-info"></span></span>
                    </li>
                    <li>
                        <span>Year: <span class="car-info-info"><input type="date" class="add-text-input" placeholder="Click to add price"></span></span>
                        <span>Mileage: <span class="car-info-info"><input type="text" class="add-text-input" placeholder="Mileage"> Km</span></span>
                    </li>
                    <li>
                        <span>Fuel type: <span class="car-info-info"></span></span>
                        <span>Engine volume: <span class="car-info-info"></span></span>
                    </li>
                    <li>
                        <span>Transmission: <span class="car-info-info"></span></span>
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
                        <span>Number plate: <span class="car-info-info"><input type="text" class="add-text-input" placeholder="Number plate"></span></span>
                        <span>Vin: <span class="car-info-info"><input type="text" class="add-text-input" placeholder="Vin"></span></span>
                    </li>
                    <li>
                        <span>Inspection: <span class="car-info-info"><input type="date" class="add-text-input"></span></span>
                        <span>Location: <span class="car-info-info"><input type="text" class="add-text-input"></span></span>
                    </li>
                    <li>
                        <span class="car-info-last">Price: <span class="car-info-info car-info-price"><input type="text" class="add-text-input" placeholder="Price">€ </span></span>
                        <span class="car-info-last"></span>
                    </li>
                </ul>
                <div class="contact-wrapper">
                    <div class="contact-div">
                        <p class="contact-info">Phone number: <input type="text" class="add-text-input" placeholder="Phone number"></p>
                    </div>
                </div>
            </div>
        </div>
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



