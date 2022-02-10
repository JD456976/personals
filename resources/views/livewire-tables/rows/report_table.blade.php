

<x-livewire-tables::table.cell>
    {{ $row->user->email }}
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <a href="{{ route('post.show', $row->post->slug) }}">{{ $row->reportable_id }}</a>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    {{ $row->reason }}
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    {{ $row->comment }}
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    @if ($row->is_resolved == 1)
        <span class="badge bg-info">RESOLVED</span>
    @else
        <span class="badge bg-danger">UNRESOLVED</span>
    @endif
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    {{ $row->created_at->diffForHumans() }}
</x-livewire-tables::table.cell>
