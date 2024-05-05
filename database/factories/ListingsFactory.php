<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class ListingsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'description' => fake()->realText(),
            'manufacture_date' => fake()->dateTimeBetween('-20 year', 'now'),
            'mileage' => fake()->randomDigit(),
            'color' => 'red',
            'teh_apskate' => fake()->dateTimeBetween('-1 year', 'now'),
            'image_path' => '\img\Opel_mokka.jpg',
            'price' => fake()->randomDigit(),
            'num_plate' => fake()->word(),
            'vin' => fake()->word(),
            'model' => fake()->word(),
            'engine_volume_id' => 2,
            'location_id' => 1,
            'fuel_id' => 1,
            'transmission_id' => 2,
            'brand_id' => 2,
            'created_by' => 1,
        ];
    }
}


