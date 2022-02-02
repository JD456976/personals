<x-layouts.app>
    <x-slot name="title">
        {{ $page->title }}
    </x-slot>
    <!-- Blog Detail -->
    <div class="blog-detail-wrapper">
        <div class="row">
            <!-- Blog -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $page->title }}</h4>
                        <p class="card-text mb-2">
                           {!! $page->content !!}
                        </p>
                        <hr class="my-2" />
                    </div>
                </div>
            </div>
            <!--/ Blog -->
        </div>
    </div>
    <!--/ Blog Detail -->
</x-layouts.app>
