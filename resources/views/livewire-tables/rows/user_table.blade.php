
<x-livewire-tables::table.cell>
    <a href="{{ route('admin.users.show', $row->id) }}">{{ $row->email }}</a>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    {{ $row->email_verified_at }}
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    {{ $row->created_at->diffForHumans() }}
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    {{ $row->updated_at->diffForHumans() }}
</x-livewire-tables::table.cell>
