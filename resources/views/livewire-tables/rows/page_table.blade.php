<x-livewire-tables::table.cell>
    <a href="{{ route('admin.page.edit', $row->slug) }}">{{ $row->title }}</a>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    {{ $row->slug }}
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    {!!  Str::words($row->content, 10)!!}
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
   @if ($row->is_active == 1)
        <span class="badge badge-glow bg-success">ACTIVE</span>
   @endif
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    @if ($row->main_menu == 1)
        <span class="badge badge-glow bg-success">YES</span>
    @endif
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    @if ($row->footer_menu == 1)
        <span class="badge badge-glow bg-success">YES</span>
    @endif
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    {{ $row->created_at->diffForHumans() }}
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    {{ $row->updated_at->diffForHumans() }}
</x-livewire-tables::table.cell>
