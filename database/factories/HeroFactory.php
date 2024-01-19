<?php

namespace Database\Factories;

use Domain\Hero\Models\Hero;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Hero>
 */
class HeroFactory extends Factory
{

    protected $model = Hero::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->firstName() . ' ' .  fake()->lastName(),
            'content' => fake()->paragraph(),
        ];
    }
}