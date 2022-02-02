<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Page;

class PageTable extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make("Title", "title")
                ->sortable(),
            Column::make("Slug", "slug")
                ->sortable(),
            Column::make("Content", "content")
                ->sortable(),
            Column::make("Active", "is_active")
                ->sortable(),
            Column::make("Main menu", "main_menu")
                ->sortable(),
            Column::make("Footer menu", "footer_menu")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }

    public function query(): Builder
    {
        return Page::query();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.page_table';
    }
}
