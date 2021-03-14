<?php

namespace Database\Factories;

use App\Models\Email;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Email::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email'       => $this->faker->safeEmail(),
            'subject'     => $this->faker->sentence(),
            'body'        => $this->faker->paragraphs(asText: true),
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

    public function openedAt($startDate = '-6 months')
    {
        return $this->state(function (array $attributes) use ($startDate) {
            return [
                'opened_at' => $this->faker->dateTimeBetween(startDate: $startDate),
            ];
        });
    }
}
