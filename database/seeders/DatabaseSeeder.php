<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ArticleSeeder::class,
            QuestionSeeder::class,
            CitySeeder::class,
            HeroSeeder::class,
            MeetingSeeder::class,
            LandfillCategorySeeder::class,
            LandfillSeeder::class,
            NavigationSeeder::class,
            PageSeeder::class,
            UserSeeder::class,
            SettingSeeder::class,
        ]);
    }
}
