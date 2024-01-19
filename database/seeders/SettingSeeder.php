<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Domain\Setting\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $items = [
            [
                'key' => 'organization',
                'value' => 'КРО ВОО "Молодая Гвардия Единой России"',
            ],
            [
                'key' => 'inn',
                'value' => '9102014190',
            ],
            [
                'key' => 'email',
                'value' => 'example@example.example',
            ],
            [
                'key' => 'phone',
                'value' => '7978',
            ],
            [
                'key' => 'vk',
                'value' => 'https://vk.com/mger_rc'
            ],
            [
                'key' => 'tg',
                'value' => 'https://t.me/mger_82'
            ]
        ];

        foreach($items as $item){
            Setting::updateOrCreate(
                $item
            );
        }

    }
}
