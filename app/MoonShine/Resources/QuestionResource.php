<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use MoonShine\Fields\ID;

use MoonShine\Fields\Text;
use MoonShine\Fields\Image;
use MoonShine\Fields\TinyMce;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Textarea;
use MoonShine\Decorations\Block;
use Domain\Question\Models\Question;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;

class QuestionResource extends ModelResource
{
    protected string $model = Question::class;

    protected string $title = 'Полезные статьи';

    public function fields(): array
    {
        return [
            Block::make([
                Text::make('Заголовок', 'title')
                ->required(),

                Textarea::make('Краткое описание','description')
                    ->hideOnIndex(),

                TinyMce::make('Содержание','content')
                    ->hideOnIndex(),

                Image::make('Обложка','thumbnail') 
                    ->hideOnIndex()
                    ->dir( getUploadPath('question') )
                    ->allowedExtensions(['jpeg','png','jpg','gif','svg']),
                    
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
