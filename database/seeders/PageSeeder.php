<?php

namespace Database\Seeders;

use Domain\Page\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
                'title' => 'Главная',
                'slug' => '/',
                'template' => 'home',
                'status' => 1,
                'sort' => 500,

            ],
            [
                'title' => 'О проекте',
                'content' => fake()->paragraph(),
                'description' => fake()->paragraph(),
                'slug' => 'about',
                'status' => 1,
                'sort' => 500,
                
            ],
            [
                'title' => 'Контакты',
                'content' => fake()->paragraph(),
                'description' => fake()->paragraph(),
                'slug' => 'contact',
                'template' => 'contact',
                'status' => 1,
                'sort' => 500,
            ],
            [
                'title' => 'Политика обработки персональных данных',
                'content' => fake()->paragraph(),
                'description' => fake()->paragraph(),
                'slug' => 'policy',
                'status' => 1,
                'sort' => 500,
            ],
            [
                'title' => 'Пользовательское соглашение',
                'content' => fake()->paragraph(),
                'description' => fake()->paragraph(),
                'slug' => 'policy-agree',
                'status' => 1,
                'sort' => 500,
            ],

        ];

        foreach($items as $item){
            Page::updateOrCreate(
                $item
            );
        }
    }
}
