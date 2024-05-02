<a href="" class="card-a">
    <div class="card">
        <div class="card-img">
            <img src="{{ $listing->image_path }}" alt="hey">
        </div>
        <div class="card-text">
            <h1 class="card-title">{{ $listing->title }}</h1>
            <h1 class="card-price">{{ $listing->price }}</h1>
            <div class="card-info">
                <div class="card-info-div">
                    <span class="info-first">{{ $listing->mileage }} Km</span>
                    <!-- <span class="info-middle">{{ $phone[$listing->phone_number - 1]->phone_number }}</span> -->
                    <span class="info-middle">{{ $listing->fuel }}</span>
                    <span class="info-last">{{ $listing->engine_volume }} L</span>
                </div>
                <div class="card-info-div">
                    <span class="info-first">{{ $listing->transmission }}</span>
                    <span class="info-last">{{ $listing->location }}</span>
                </div>
            </div>
        </div>
    </div>
</a>
