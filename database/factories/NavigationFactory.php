<?php

namespace Database\Factories;

use Domain\Setting\Models\Navigation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Domain\Setting\Models\navigation>
 */
class NavigationFactory extends Factory
{
    protected $model = Navigation::class;


    public function definition()
    {
        return [
            'title' => fake()->word(),
            'url' => fake()->slug(),
            'type' => 'top',
            'status' => 1
        ];
    }
}
