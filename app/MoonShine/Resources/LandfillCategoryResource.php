<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use MoonShine\Fields\ID;


use MoonShine\Fields\Text;
use MoonShine\Fields\Number;
use MoonShine\Fields\Switcher;
use MoonShine\Decorations\Block;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use Domain\Landfill\Models\LandfillCategory;

class LandfillCategoryResource extends ModelResource
{
    protected string $model = LandfillCategory::class;

    protected string $title = 'Статусы';

    public function fields(): array
    {
        return [
            Block::make([
                Text::make('Заголовок','title'),

                Number::make('Порядок сортировки','sort')
                    ->default(500),
                    
                Switcher::make('Активный', 'status')
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }
}
