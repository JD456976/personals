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
            Column::make('Zipcode', 'zipcode')
                ->sortable()
                ->searchable(),
            Column::make('Has Image(s)')
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
        ];
    }

    public function query(): Builder
    {

        $posts = $this->posts;
        return Post::query()
            ->where('cat_id',$posts);
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.post_table';
    }


}
