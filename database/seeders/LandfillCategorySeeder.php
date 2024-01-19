<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Domain\Landfill\Models\LandfillCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LandfillCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'title' => 'Новая',
                'slug' => 'new',
                'sort' => 100,
            ],
            [
                'title' => 'Обжалована',
                'slug' => 'appealed',
                'sort' => 200,
            ],
            [
                'title' => 'Ликвидирована',
                'slug' => 'liquidated',
                'sort' => 300,
            ]
        ];
        

        foreach($items as $item){
            LandfillCategory::updateOrCreate(
                $item
            );
        }
    }
}
