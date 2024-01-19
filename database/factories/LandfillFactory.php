<?php

namespace Database\Factories;

use Domain\Landfill\Models\Landfill;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * 
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<Domain\Landfill\Models\Landfill>
 */
class LandfillFactory extends Factory
{

    protected $model = Landfill::class;
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
            'address' => fake()->address(),
            'coordinates' => $this->faker->longitude(33, 36) . ', ' . $this->faker->latitude(44, 46),
        ];
    }
}