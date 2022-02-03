<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;

class UserTable extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make("Email", "email")
                ->sortable()
                ->searchable(),
            Column::make("Verified", "email_verified_at")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }

    public function query(): Builder
    {
        return User::query();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.user_table';
    }
}
