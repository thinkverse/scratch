<?php

namespace Database\Factories;

use App\Models\ProductVariation;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductVariationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductVariation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'  => $this->faker->words(asText: true),
            'price' => $this->faker->numberBetween(10, 1024),
            'order' => $this->faker->numberBetween(0, 10),
        ];
    }


    public function nullPrice()
    {
        return $this->state(['price', null]);
    }
}
