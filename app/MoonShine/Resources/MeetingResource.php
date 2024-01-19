<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use MoonShine\Fields\ID;


use MoonShine\Fields\Date;
use MoonShine\Fields\Text;
use MoonShine\Fields\Image;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Textarea;
use MoonShine\Decorations\Block;
use App\MoonShine\Fields\MapField;
use Domain\Meeting\Models\Meeting;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use App\MoonShine\Resources\CityResource;
use MoonShine\Fields\Relationships\BelongsTo;

class MeetingResource extends ModelResource
{
    protected string $model = Meeting::class;

    protected string $title = 'Субботники';

    public function fields(): array
    {
        return [
            Block::make([
                Text::make('Заголовок', 'title')
                    ->required(),

                Textarea::make('Содержание','content')
                    ->hideOnIndex(),

                Text::make('Адрес','address')
                    ->required(),

                Image::make('Обложка','thumbnail') 
                    ->hideOnIndex(),

                Text::make('Имя контактного лица','name'),

                Text::make('Номер контактного лица','phone'),

                MapField::make('Координаты', 'coordinates')
                    ->hideOnIndex(),

                BelongsTo::make(
                        'МО',
                        'city',
                        fn($item) => "$item->title" ,
                        resource: new CityResource()
                )
                    ->searchable()
                    ->badge('purple'),

                Date::make('Дата и время начала', 'start_at')
                    ->withTime()
                    ->format("d.m.Y h:i")
                    ->required()
                    ->sortable()
                    ->showOnExport(),
                    
                Switcher::make('Активный', 'status')
                    ->default(true)
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }
}                               