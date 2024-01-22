<?php

namespace Database\Seeders;

use Domain\City\Models\City;
use Illuminate\Database\Seeder;
use Database\Factories\VolunteerFactory;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VolunteerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VolunteerFactory::new()
            ->count(20)
            ->sequence(
                ['status' => 'moderation'],
                ['status' => 'public'],
                ['status' => 'cancel'],
            )
            ->state(new Sequence(
                fn (Sequence $sequence) => ['city_id' => City::all()->random()],
            ))
            ->create();
    }
}
