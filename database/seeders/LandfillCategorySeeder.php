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
                'thumbnail' => 'images/landfill-category/2024/01/19/60hEVbXLL8.svg',
                'slug' => 'new',
                'sort' => 100,
            ],
            [
                'title' => 'Обжалована',
                'thumbnail' => 'images/landfill-category/2024/01/19/djaWPa5cs3.svg',
                'slug' => 'appealed',
                'sort' => 200,
            ],
            [
                'title' => 'Ликвидирована',
                'thumbnail' => 'images/landfill-category/2024/01/19/XIITMi8KPb.svg',
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
