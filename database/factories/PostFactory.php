<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'  => $this->faker->sentence(),
            'body'   => $this->faker->paragraphs(asText: true),
            'status' => $this->faker->randomElement([0, 1, 2, 3]),
        ];
    }

    public function creationDates()
    {
        return $this->state(function (array $attributes) {
            return [
                'created_at' => $this->faker->dateTimeBetween(startDate: '-6 months'),
                'updated_at' => $this->faker->dateTimeBetween(startDate: '-6 months'),
            ];
        });
    }
}
