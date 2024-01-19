<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use MoonShine\Fields\ID;


use MoonShine\Fields\Text;
use MoonShine\Fields\Number;
use MoonShine\Attributes\Icon;
use MoonShine\Fields\Switcher;
use MoonShine\Decorations\Block;
use MoonShine\Pages\Crud\FormPage;
use MoonShine\Pages\Crud\DetailPage;
use Domain\Setting\Models\Navigation;
use Illuminate\Database\Eloquent\Model;
use App\MoonShine\Pages\NavigationTreePage;
use Leeto\MoonShineTree\Resources\TreeResource;

#[Icon('heroicons.outline.bars-arrow-down')]
class NavigationResource extends TreeResource
{
    protected string $model = Navigation::class;

    protected string $title = 'Меню';

    protected string $column = 'title';

    protected string $sortColumn = 'sort';

    public function fields(): array
    {
        return [
            Block::make([
                Text::make('Заголовок','title'),

                Text::make('url'),

                Number::make('Порядок сортировки','sort')
                    ->default(500),
                    
                Switcher::make('Активный', 'status') 
            ]),
        ];
    }

    public function pages(): array
        {
        return [
            NavigationTreePage::make($this->title()),
            FormPage::make(
                $this->getItemID()
                    ? __('moonshine::ui.edit')
                    : __('moonshine::ui.add')
            ),
            DetailPage::make(__('moonshine::ui.show')),
        ];
    }

    public function sortKey(): string
    {
        return 'sort';
    }

    public function treeKey(): ?string
    {
        return 'navigation_id';
    }

    public function rules(Model $item): array
    {
        return [];
    }
    public function itemContent(Model $item): string
    {
        return "$item->sort";
    }
}
