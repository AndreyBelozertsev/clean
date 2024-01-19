<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Factories\QuestionFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        QuestionFactory::new()
        ->count(40)
        ->create();
    }
}
