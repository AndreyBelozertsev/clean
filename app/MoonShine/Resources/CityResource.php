<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use MoonShine\Fields\ID;


use MoonShine\Fields\Text;
use Domain\City\Models\City;
use MoonShine\Fields\Number;
use MoonShine\Fields\Switcher;
use MoonShine\Decorations\Block;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;

class CityResource extends ModelResource
{
    protected string $model = City::class;

    protected string $title = 'Муниципальные образования';

    protected string $sortColumn = 'title';
 
    protected string $sortDirection = 'ASC';

    public function fields(): array
    {
        return [
            Block::make([
                Text::make('Заголовок','title')
                    ->required(),

                Number::make('Порядок сортировки','sort')
                    ->default(500),
                    
                Switcher::make('Активный', 'status')
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [
            'title' => ['required', 'max:100'],
            'sort' => ['required','integer'],
            'status' => ['required','boolean']
        ];
    }
}


// $table->id();
// $table->string('title');
// $table->string('slug')->unique();
// $table->integer('sort')->default(500)->nullable();
// $table->boolean('status')->default(true);
// $table->timestamps();