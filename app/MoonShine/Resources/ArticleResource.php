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
use Domain\Article\Models\Article;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;

class ArticleResource extends ModelResource
{
    protected string $model = Article::class;

    protected string $title = 'Новости';

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
                    ->dir( getUploadPath('article') )
                    ->allowedExtensions(['jpeg','png','jpg','gif','svg']) ,
                    
                Switcher::make('Активный', 'status')
                    ->required()
                    ->default(true)
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [
            'title' => ['required', 'max:200'],
            'thumbnail' => ['sometimes','image','mimes:jpeg,png,jpg,gif,svg','max:4096','nullable'],
            'description' => [],
            'content' => [],
            'status' => ['required','boolean']
        ];
    }
}


// $table->string('title');
// $table->string('slug')->unique();
// $table->string('thumbnail')->nullable();
// $table->text('description')->nullable();
// $table->text('content')->nullable();
// $table->boolean('status')->default(true);
// $table->timestamps();