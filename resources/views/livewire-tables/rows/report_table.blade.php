<x-livewire-tables::table.cell>
    {{ $row->id }}
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    {{ $row->user_id }}
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    {{ $row->reportable_type }}
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    {{ $row->reportable_id }}
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    {{ $row->reason }}
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    {{ $row->comment }}
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    resolved
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    {{ $row->created_at->diffForHumans() }}
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    {{ $row->updated_at->diffForHumans() }}
</x-livewire-tables::table.cell>
