<x-layouts.app>
    <x-slot name="title">
        Welcome
    </x-slot>
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">

                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a>
                            </li>
                            <li class="breadcrumb-item active"> {{ $category->title }}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <livewire:post-table :posts="$query">
</x-layouts.app>
