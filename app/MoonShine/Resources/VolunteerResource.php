<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use MoonShine\Fields\ID;

use App\Enums\StatusEnum;
use MoonShine\Fields\Enum;
use MoonShine\Fields\Text;
use Illuminate\Support\Str;
use MoonShine\Fields\Image;
use Domain\City\Models\City;
use MoonShine\Fields\Number;
use MoonShine\Decorations\Tab;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Textarea;
use MoonShine\Decorations\Tabs;
use MoonShine\Decorations\Block;
use Illuminate\Http\UploadedFile;
use Domain\Volunteer\Models\Volunteer;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Relationships\BelongsToMany;
use Illuminate\Contracts\Database\Eloquent\Builder;

class VolunteerResource extends ModelResource
{
    protected string $model = Volunteer::class;

    protected string $title = 'Добровольцы';

    public function fields(): array
    {
        return [
            
            Block::make([
                Tabs::make([
                    Tab::make('Общая информация', [
                        Text::make('ФИО','name')
                            ->required(),
                        
                        Text::make('Номер телефона','phone')
                            ->hideOnIndex()
                            ->hint('В формате: 79781234567')
                            ->required(),

                        Image::make('Фото','thumbnail')
                            ->allowedExtensions(['jpeg','png','jpg','gif','svg'])
                            ->customName(function (UploadedFile $file, Image $field){
                                return getUploadPath('volunteer') . '/' . Str::random(10) . '.' . $file->extension();
                            })
                            ->removable()
                            ->enableDeleteDir()
                            ->hideOnIndex(),
                        
                        BelongsTo::make(
                                'МО',
                                'city',
                                fn($item) => "$item->title" ,
                                resource: new CityResource()
                            )
                                ->searchable()
                                ->badge('purple'),

                        Textarea::make('Содержание','content')
                            ->hideOnIndex(),
                        
                        Enum::make('Статус публикации','status') 
                            ->default('moderation')
                            ->attach(StatusEnum::class)
                    ]),
                    Tab::make('Субботники', [
                        Text::make('Всего баллов','meetings_sum_scores')
                            ->hideOnForm()
                            ->badge('green')
                            ->sortable()
                            ->readonly(),

                        BelongsToMany::make('Субботники', 'meetings', formatted: fn($item) => "$item->title ({$item->city->title}) -  $item->start_at (Баллов: $item->scores)" ,resource: new MeetingResource())
                            ->selectMode()
                            ->hideOnIndex(),
                    ])
                ])
                    
            ]),
        ];
    }

    public function query(): Builder 
    {
        return parent::query()
            ->withSum('meetings', 'scores');
    } 

    public function resolveItemQuery(): Builder 
    {
        return parent::query()
            ->withSum('meetings', 'scores');
    } 

    public function rules(Model $item): array
    {
        return [
            'name' => ['required','string', 'max:50'],
            'phone' => ['required','digits:11'],
            'content' => ['sometimes','string','nullable', 'max:1500'],
            'thumbnail' => ['sometimes','required', 'image','mimes:jpeg,png,jpg','max:4096', 'dimensions:min_width=600,min_height=600'],
            'city_id' => ['required','numeric', 'max:' . City::max('id')],
            'status' => [],
        ];
    }
}