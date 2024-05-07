<a href="/listing/{{$listing->id}} " class="card-a">
    <div class="card">
        <div class="card-img">
            <img src="{{ $listing->image_path }}" alt="hey">
        </div>
        <div class="card-text">
            <h1 class="card-title">{{ $listing->title }}</h1>
            <h1 class="card-price">{{ $listing->price }} €</h1>
            <div class="card-info">
                <div class="card-info-div">
                    <span class="info-first">{{ $listing->mileage }} Km</span>
                    <span class="info-middle">{{ $fuels[$listing->fuel_id - 1]->fuel }}</span>
                    <span class="info-last">{{ $engineVolumes[$listing->engine_volume_id - 1]->engine_volume }} L</span>
                </div>
                <div class="card-info-div">
                    <span class="info-first">{{ $transmissions[$listing->transmission_id - 1]->transmission }}</span>
                    <span class="info-last">{{ $locations[$listing->location_id - 1]->location }}</span>
                </div>
            </div>
        </div>
        <div class="show-edit-options">
            <div>
                <object>
                    <a href="/listing/{{ $listing->id }}/edit" class="show-inner-a-edit show-inner-a">
                        Edit
                    </a>
                </object>
            </div>
            <div>
                <object>
                <form method="POST" action="/listing/{{$listing->id}}">
                    @csrf
                    @method("DELETE")
                    <button class="show-inner-a-delete show-inner-a">
                        Delete
                    </button>
                </form>
                </object>
            </div>
        </div>
    </div>
</a>
