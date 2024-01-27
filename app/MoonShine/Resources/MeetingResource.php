<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use MoonShine\Fields\ID;


use MoonShine\Fields\Date;
use MoonShine\Fields\Text;
use Illuminate\Support\Str;
use MoonShine\Fields\Image;
use MoonShine\Fields\Number;
use MoonShine\Decorations\Tab;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Textarea;
use MoonShine\Decorations\Tabs;
use MoonShine\Decorations\Block;
use Illuminate\Http\UploadedFile;
use App\MoonShine\Fields\MapField;
use Domain\Meeting\Models\Meeting;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use App\MoonShine\Resources\CityResource;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Relationships\BelongsToMany;

class MeetingResource extends ModelResource
{
    protected string $model = Meeting::class;

    protected string $title = 'Субботники';

    public function fields(): array
    {
        return [
            Block::make([
                Tabs::make([
                    Tab::make('Общая информация', [
                        Text::make('Заголовок', 'title')
                            ->required(),

                        Textarea::make('Содержание','content')
                            ->hideOnIndex(),

                        Text::make('Адрес','address')
                            ->required(),

                        Number::make('Баллы','scores'),

                        Image::make('Обложка','thumbnail') 
                            ->hideOnIndex()
                            ->customName(function (UploadedFile $file, Image $field){
                                return getUploadPath('meeting') . '/' . Str::random(10) . '.' . $file->extension();
                            })
                            ->allowedExtensions(['jpeg','png','jpg','gif','svg']),

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
                    Tab::make('Волонтеры', [
                        BelongsToMany::make('Волонтеры', 'volunteers', formatted: 'name',resource: new VolunteerResource())
                            ->selectMode(),
                    ])
                ])
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }
}                               