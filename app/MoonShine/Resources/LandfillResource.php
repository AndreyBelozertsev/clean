<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use MoonShine\Fields\ID;


use App\Enums\StatusEnum;
use MoonShine\Fields\Date;
use MoonShine\Fields\Enum;
use MoonShine\Fields\Text;
use Illuminate\Support\Str;
use MoonShine\Fields\Field;
use MoonShine\Fields\Image;
use Domain\City\Models\City;
use MoonShine\Fields\TinyMce;

use MoonShine\Fields\Textarea;
use MoonShine\Decorations\Block;
use Illuminate\Http\UploadedFile;
use App\MoonShine\Fields\MapField;
use Domain\Landfill\Models\Landfill;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use App\MoonShine\Resources\CityResource;
use MoonShine\Fields\Relationships\BelongsTo;
use App\MoonShine\Resources\LandfillCategoryResource;

class LandfillResource extends ModelResource
{
    protected string $model = Landfill::class;

    protected string $title = 'Свалки';

    public function fields(): array
    {
        return [
            Block::make([
                Text::make('Адрес','address')
                    ->readonly(),

                Text::make('Имя заявителя','name')
                    ->hideOnIndex()
                    ->readonly(),

                Text::make('Номер телефона заявителя','phone')
                    ->hideOnIndex()
                    ->hint('В формате: 79781234567')
                    ->readonly(),

                Date::make('Дата добавления', 'created_at')
                    ->format("d.m.Y h:i")
                    ->default(now()->toDateTimeString())
                    ->sortable()
                    ->showOnExport(),

                Textarea::make('Содержание','content')
                    ->hideOnIndex()
                    ->readonly(),

                MapField::make('Координаты', 'coordinates')
                    ->hideOnIndex()
                    ->readonly(),

                Image::make('Фото','images') 
                    ->hideOnIndex()
                    ->multiple()
                    ->removable() 
                    ->customName(function (UploadedFile $file, Field $field){
                         return getUploadPath('landfill') . '/' . Str::random(10) . '.' . $file->extension();
                    })
                    ->allowedExtensions(['jpeg','png','jpg']),

                BelongsTo::make(
                    'МО',
                    'city',
                    fn($item) => "$item->title" ,
                    resource: new CityResource()
                )
                    ->searchable()
                    ->badge('purple')
                    ->sortable()
                    ->readonly(),

                BelongsTo::make(
                    'На какой стадии',
                    'category',
                    fn($item) => "$item->title" ,
                    resource: new LandfillCategoryResource()
                )
                    ->badge(function($status, BelongsTo $field){
                        if($status->slug == 'new'){
                            return 'yellow';
                        }else if($status->slug == 'liquidated'){
                            return 'green';
                        }else if($status->slug == 'appealed'){
                            return 'red';
                        }else{
                            return 'blue';
                        }
                    }),
                    
                Enum::make('Статус публикации','status') 
                    ->attach(StatusEnum::class)
                    ->default('moderation')
                    ->sortable(),
            ]),
        ];
    }

    //...
    public function getActiveActions(): array 
    {
        return ['view', 'update' ];
    }

    public function rules(Model $item): array
    {
        return [
            'address' => ['required','string','max:180'],
            'city_id' => ['required','numeric', 'max:' . City::max('id')],
            'name' => ['required','string', 'max:50'],
            'phone' => ['required','digits:11'],
            'content' => ['sometimes','string','nullable', 'max:1500'],
            'status' => [],
        ];
    }
} 