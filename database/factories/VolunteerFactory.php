<?php

namespace Database\Factories;

use Domain\Volunteer\Models\Volunteer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Volunteer>
 */
class VolunteerFactory extends Factory
{

    protected $model = Volunteer::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->firstName() . ' ' .  fake()->lastName(),
            'phone' => fake()->e164PhoneNumber(),
            'content' => fake()->paragraph(),
        ];
    }
}