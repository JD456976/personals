<x-layouts.app>
    <x-slot name="title">
        Welcome
    </x-slot>

    <!-- Knowledge base -->
    <section id="knowledge-base-content">
        <div class="row kb-search-content-info match-height">
            <!-- sales card -->
            @foreach ($categories as $category)
                <div class="col-md-4 col-sm-6 col-12 kb-search-content">
                    <div class="card">
                        <a href="{{ route('posts.category', [$category->id, $category->slug]) }}">
                            <img src="../../../app-assets/images/illustration/sales.svg" class="card-img-top" alt="knowledge-base-image" />

                            <div class="card-body text-center">
                                <h4>{{ $category->title }}</h4>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- Knowledge base ends -->
</x-layouts.app>
