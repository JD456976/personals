<x-livewire-tables::bs5.table.cell>
    <a href="{{ route('post.show', $row->slug) }}">{{ $row->title }}</a>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ $row->zipcode }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    @if ($row->getMedia('posts')->count() == 0)
        <span class="badge badge-glow bg-warning">No Images</span>
    @else
        <span class="badge badge-glow bg-success">Has Images</span>
    @endif
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ $row->created_at->diffForHumans() }}
</x-livewire-tables::bs5.table.cell>
