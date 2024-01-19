<?php

namespace Database\Seeders;

use Domain\City\Models\City;
use Illuminate\Database\Seeder;
use Domain\Landfill\Models\Landfill;
use Database\Factories\LandfillFactory;
use Domain\Landfill\Models\LandfillCategory;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LandfillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LandfillFactory::new()
            ->count(40)
            ->sequence(
                ['status' => 'moderation'],
                ['status' => 'public'],
                ['status' => 'cancel'],
            )
            ->state(new Sequence(
                fn (Sequence $sequence) => ['landfill_category_id' => LandfillCategory::all()->random()],
            ))
            ->state(new Sequence(
                fn (Sequence $sequence) => ['city_id' => City::all()->random()],
            ))
            ->create();
    }
}
