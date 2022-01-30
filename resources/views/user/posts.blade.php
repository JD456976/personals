<x-layouts.app>
    <x-slot name="title">
        Your Posts
    </x-slot>
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Your Posts</h2>
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
                        <a href="page-blog-detail.html">
                            @if ($post->getMedia('posts')->count() == 0)
                                <img class="card-img-top img-fluid" src="{{ asset('app-assets/images/no_images.png') }}" alt="Blog Post pic" />
                            @else
                                <img class="card-img-top img-fluid" src="{{ $post->getFirstMediaUrl('posts') }}" alt="Blog Post pic" />
                            @endif
                        </a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="page-blog-detail.html" class="blog-title-truncate text-body-heading">{{ $post->title }}</a>
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
                                    <a href="{{ route('post.edit',$post->id) }}"><button type="button" class="btn btn-primary waves-effect waves-float waves-light">RENEW</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!--/ Blog List Items -->

        <!-- Pagination -->
        <div class="row">
            <div class="col-12">
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center mt-2">
                        <li class="page-item prev-item"><a class="page-link" href="#"></a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item active" aria-current="page"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item"><a class="page-link" href="#">6</a></li>
                        <li class="page-item"><a class="page-link" href="#">7</a></li>
                        <li class="page-item next-item"><a class="page-link" href="#"></a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <!--/ Pagination -->
    </div>
    <!--/ Blog List -->
</x-layouts.app>
