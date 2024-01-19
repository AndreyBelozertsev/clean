<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use MoonShine\Pages\Page;
use MoonShine\Fields\Text;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Column;
use Domain\Setting\Models\Setting;
use Illuminate\Support\Collection;
use MoonShine\Components\FormBuilder;

class SettingPage extends Page
{
    public function breadcrumbs(): array
    {
        return [
            '#' => $this->title()
        ];
    }

    public function title(): string
    {
        return $this->title ?: 'Данные';
    }

    public function components(): array
	{
		return [
            FormBuilder::make(route('moonshine.setting.update'))
            ->fields([
                Grid::make([ 
                    Column::make([
                        Text::make('Название организации','organization'),
                    ])
                        ->columnSpan(12),
                         
                    Column::make([
                        Text::make('ИНН организации', 'inn'),
                        Text::make('Адрес электронной почты', 'email'),
                        Text::make('Номер телефон', 'phone'),
                    ])
                        ->columnSpan(6), 
         
                    Column::make([ 
                        Text::make('ВК', 'vk'),
                        Text::make('Telegram', 'tg'),
                    ])
                        ->columnSpan(6) 
                ])
                
            ])
            ->fill($this->getData())
            ->submit('Сохранить', ['class' => 'btn-primary']) 
            ->name('setting-form')
        ];
	}

    protected function getData():array
    {
        return Setting::all()->mapWithKeys(function ( $item, $key) {
            return [$item['key'] => $item['value']];
        })->toArray();
    }
}
