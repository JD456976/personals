<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Post;

class PostTable extends DataTableComponent
{

    public $posts;

    public function columns(): array
    {
        return [
            Column::make("Title", "title")
                ->sortable()
                ->searchable(),
            Column::make("Featured", 'is_featured')
                ->sortable(),
            Column::make('Zipcode', 'zipcode')
                ->sortable()
                ->searchable(),
            Column::make('Has Image(s)'),
            Column::make("Posted", "created_at")
                ->sortable(),
        ];
    }

    public function query(): Builder
    {
        return Post::query()
            ->where('category_id',$this->posts);
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.post_table';
    }


}
