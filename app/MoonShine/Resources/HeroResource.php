<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use MoonShine\Fields\ID;

use MoonShine\Fields\Text;
use MoonShine\Fields\Image;
use Domain\Hero\Models\Hero;
use MoonShine\Fields\Number;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Textarea;
use MoonShine\Decorations\Block;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;

class HeroResource extends ModelResource
{
    protected string $model = Hero::class;

    protected string $title = 'Волонтеры';

    public function fields(): array
    {
        return [
            Block::make([
                Text::make('ФИО','name')
                    ->reuired(),

                Image::make('Фото','thumbnail')
                    ->allowedExtensions(['jpeg','png','jpg','gif','svg']) ,

                Textarea::make('Содержание','content'),

                Number::make('Баллы','score'),
                
                Switcher::make('Активный', 'status')
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [
            'name' => ['required', 'max:200'],
            'thumbnail' => ['sometimes','image','mimes:jpeg,png,jpg,gif,svg','max:4096','nullable'],
            'content' => ['sometimes','string', 'nullable'],
            'score' => ['required','integer'],
            'status' => ['required','boolean']
        ];
    }
}