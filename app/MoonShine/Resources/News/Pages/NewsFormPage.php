<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\News\Pages;

use MoonShine\Laravel\Pages\Crud\FormPage;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Contracts\Core\TypeCasts\DataWrapperContract;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Textarea;
use MoonShine\UI\Components\Layout\Box;
use App\MoonShine\Resources\News\NewsResource;

class NewsFormPage extends FormPage
{
    protected function fields(): iterable
    {
        return [
            Box::make([
                ID::make(),

                Text::make('Judul Berita', 'title')
                    ->required(),

                Text::make('Slug', 'slug')
                    ->required(),

                Text::make('Thumbnail', 'thumbnail'),

                Textarea::make('Isi Berita', 'content')
                    ->required(),

                Text::make('ID Penulis', 'author_id')
                    ->required(),

                Text::make('ID Kategori', 'news_category_id')
                    ->required(),
            ]),
        ];
    }

    protected function rules(DataWrapperContract $item): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'author_id' => ['required', 'integer', 'exists:authors,id'],
            'news_category_id' => ['required', 'integer', 'exists:news_categories,id'],
        ];
    }
}