<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Factories\ArticleFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ArticleFactory::new()
            ->count(40)
            ->create();
    }
}
