<?php

namespace Database\Factories;

use App\Enums\CarBody;
use App\Enums\CarColor;
use App\Enums\CarFuel;
use App\Models\CarModel;
use App\Models\Make;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'make_id' => 1,
            'model_id' => 1,
            'fuel' => 'Diesel',
            'year' => 1986,
            'body' => 'Sedan',
            'horsepower' => 150,
            'capacity' => 1997,
            'doors' => 4,
            'color' => 'Black',
            'transmission' => 'Automatic'
        ];
    }
}
