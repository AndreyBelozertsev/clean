<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use MoonShine\Fields\ID;


use Domain\Seo\Models\Seo;
use MoonShine\Fields\Text;
use MoonShine\Attributes\Icon;
use MoonShine\Fields\Textarea;
use MoonShine\Decorations\Block;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;


class SeoResource extends ModelResource
{
    protected string $model = Seo::class;

    protected string $title = 'Seo';

    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),

                Text::make('Url'),

                Text::make('Title'),
                
                Textarea::make('Description') 
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }
}
