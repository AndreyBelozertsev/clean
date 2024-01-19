<?php

namespace Database\Seeders;

use Domain\City\Models\City;
use Illuminate\Database\Seeder;
use Database\Factories\MeetingFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MeetingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MeetingFactory::new()
        ->count(20)
        ->create([
            'city_id'=>City::inRandomOrder()->first()
        ]);
    }
}
