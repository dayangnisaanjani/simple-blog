<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\News\Pages;

use MoonShine\Laravel\Pages\Crud\IndexPage;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Components\Table\TableBuilder;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Laravel\QueryTags\QueryTag;
use MoonShine\UI\Components\Metrics\Wrapped\Metric;
use MoonShine\UI\Fields\ID;
use App\MoonShine\Resources\News\NewsResource;
use MoonShine\Support\ListOf;
use Throwable;

class NewsIndexPage extends IndexPage
{
    protected bool $isLazy = true;

    protected function fields(): iterable
    {
        return [
            ID::make(),
            Text::make('Judul', 'title'),
            Text::make('Slug', 'slug'),
            Text::make('Thumbnail', 'thumbnail'),
            Text::make('ID Penulis', 'author_id'),
            Text::make('ID Kategori', 'news_category_id'),
        ];
    }
}
