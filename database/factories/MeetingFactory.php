<?php

namespace Database\Factories;

use Domain\Meeting\Models\Meeting;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Meeting>
 */
class MeetingFactory extends Factory
{

    protected $model = Meeting::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->word(),
            'content' => fake()->paragraph(),
            'address' => fake()->address(),
            'name' => fake()->firstName() . ' ' .  fake()->lastName(),
            'phone' => fake()->e164PhoneNumber(),
            'coordinates' => $this->faker->longitude(33, 36) . ', ' . $this->faker->latitude(44, 46),
            'start_at' => fake()->dateTimeThisYear('+2 months'),

        ];
    }
} 