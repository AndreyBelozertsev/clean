<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

use Domain\Setting\Models\Navigation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NavigationSeeder extends Seeder
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
                'url' => '/',
                'type' => 'top',
                'status' => 1,
                'sort' => 500,

            ],
            [
                'title' => 'Свалки',
                'url' => 'landfill',
                'status' => 1,
                'sort' => 500,
                
            ],
            [
                'title' => 'О проекте',
                'url' => 'about',
                'status' => 1,
                'sort' => 500,
                
            ],
            [
                'title' => 'Субботники',
                'url' => 'meeting',
                'status' => 1,
                'sort' => 500,
                
            ],
            [
                'title' => 'Новости',
                'url' => 'article',
                'status' => 1,
                'sort' => 500,
            ],
            [
                'title' => 'Добровольцы',
                'url' => 'volunteer',
                'status' => 1,
                'sort' => 500,
            ],
            [
                'title' => 'Полезные статьи',
                'url' => 'question',
                'status' => 1,
                'sort' => 500,
            ],
            [
                'title' => 'Контакты',
                'url' => 'contact',
                'status' => 1,
                'sort' => 500,
            ],
        ];
        

        foreach($items as $item){
            Navigation::updateOrCreate(
                $item
            );
        }
    }
}
