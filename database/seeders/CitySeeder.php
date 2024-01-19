<?php

namespace Database\Seeders;

use Domain\City\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            [
                'title' => 'Алушта'
            ],  
            [
                'title' => 'Армянск'
            ], 
            [
                'title' => 'Бахчисарай'
            ],   
            [
                'title' => 'Бахчисарайский район'
            ],
            [
                'title' => 'Белогорск'
            ],
            [
                'title' => 'Белогорский район'
            ],
            [
                'title' => 'Джанкой'
            ],
            [
                'title' => 'Джанкойский район'
            ],
            [
                'title' => 'Евпатория'
            ],
            [
                'title' => 'Керчь'
            ],
            [
                'title' => 'Кировский район'
            ],
            [
                'title' => 'Красногвардейский район'
            ],
            [
                'title' => 'Красноперекопск'
            ],
            [
                'title' => 'Красноперекопский район'
            ],
            [
                'title' => 'Ленинский район'
            ],
            [
                'title' => 'Нижнегорский район'
            ],
            [
                'title' => 'Первомайский райн'
            ],
            [
                'title' => 'Раздольненский район'
            ],
            [
                'title' => 'Саки'
            ],
            [
                'title' => 'Сакский район'
            ],
            [
                'title' => 'Симферополь'
            ],
            [
                'title' => 'Симферопольский район'
            ],
            [
                'title' => 'Советский район'
            ],
            [
                'title' => 'Судак'
            ],
            [
                'title' => 'Феодосия'
            ],
            [
                'title' => 'Черноморский район'],
            [
                'title' => 'Ялта'
            ]
        ];

        foreach($cities as $city){
            City::updateOrCreate(
                $city
            );
        }
    }
}
