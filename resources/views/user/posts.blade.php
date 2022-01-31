<x-layouts.app>
    <x-slot name="title">
        Your Posts
    </x-slot>
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Your Posts</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog List -->
    <div class="blog-list-wrapper">
        <!-- Blog List Items -->
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-3">
                    <div class="card">
                            @if ($post->getMedia('posts')->count() == 0)
                                <img class="card-img-top img-fluid" src="{{ asset('app-assets/images/no_images.png') }}" alt="Blog Post pic" />
                            @else
                                <img class="card-img-top img-fluid" src="{{ $post->getFirstMediaUrl('posts') }}" alt="Blog Post pic" />
                            @endif
                        <div class="card-body">
                            <h4 class="card-title">
                                {{ $post->title }}
                            </h4>
                            <div class="d-flex">
                                <div class="author-info">
                                    <small class="text-muted">Posted: {{ $post->created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                            <div class="my-1 py-25">
                            </div>
                            <p class="card-text blog-content-truncate">
                                {{ Str::words($post->content, 10) }}
                            </p>
                            <hr />
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Number of Views" class="d-flex align-items-center me-1">
                                        <i data-feather="eye" class="font-medium-5 text-body align-middle"></i>
                                    </div>
                                    {{ views($post)->count() }}
                                </div>
                                <div>
                                    @if ($post->is_expired == 1)
                                        <a href="{{ route('post.edit',$post->id) }}"><button type="button" class="btn btn-primary waves-effect waves-float waves-light">RENEW</button></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!--/ Blog List Items -->
    </div>
    <!--/ Blog List -->
</x-layouts.app>
