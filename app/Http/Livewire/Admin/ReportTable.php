<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Report;

class ReportTable extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make("Reported By", "user_id")
                ->sortable(),
            Column::make("Reportable id", "reportable_id")
                ->sortable(),
            Column::make("Reason", "reason")
                ->sortable(),
            Column::make("Comment", "comment")
                ->sortable(),
            Column::make("Is resolved", "is_resolved")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
        ];
    }

    public function query(): Builder
    {
        return Report::query();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.report_table';
    }
}
