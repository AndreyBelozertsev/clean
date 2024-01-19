<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Factories\HeroFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HeroFactory::new()
            ->count(20)
            ->create();
    }
}
