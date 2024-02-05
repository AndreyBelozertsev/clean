<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use MoonShine\Fields\ID;


use MoonShine\Fields\Text;
use Illuminate\Support\Str;
use MoonShine\Fields\Image;
use MoonShine\Fields\Number;
use MoonShine\Fields\Switcher;
use MoonShine\Decorations\Block;
use Illuminate\Http\UploadedFile;
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

                Image::make('Иконка карты','thumbnail') 
                    ->hideOnIndex()
                    ->customName(function (UploadedFile $file, Image $field){
                        return getUploadPath('landfill-category') . '/' . Str::random(10) . '.' . $file->extension();
                   })
                    ->allowedExtensions(['jpeg','png','jpg','gif','svg']) ,

                Number::make('Порядок сортировки','sort')
                    ->default(500),
                    
                Switcher::make('Активный', 'status')
                    ->default(true)
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [
            'title' => ['required', 'max:150'],
            'thumbnail' => ['sometimes','image','mimes:jpeg,png,jpg,gif,svg','max:4096','nullable'],
            'content' => [],
            'status' => ['required','boolean']
        ];
    }
}



