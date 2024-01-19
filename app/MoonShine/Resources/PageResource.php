<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use MoonShine\Fields\ID;



use MoonShine\Fields\Text;
use Domain\Page\Models\Page;
use MoonShine\Fields\TinyMce;
use MoonShine\Fields\Switcher;
use MoonShine\Decorations\Block;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;

class PageResource extends ModelResource
{
    protected string $model = Page::class;

    protected string $title = 'Страницы';

    public function fields(): array
    {
        return [
            Block::make([
                Text::make('Заголовок','title'),

                TinyMce::make('Содержание','content')
                    ->readonly(),
                    
                Switcher::make('Активный', 'status')
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }
}