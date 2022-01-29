<x-layouts.app>
    <x-slot name="title">
        {{ $post->title }}
    </x-slot>
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">{{ $post->title }}</h2>
                    <div class="breadcrumb-wrapper">
                        {{ Breadcrumbs::render('category', $category) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Detail -->
    <div class="blog-detail-wrapper">
        <div class="row">
            <!-- Blog -->
            <div class="col-12">
                <div class="card">
                    @if ($post->getMedia('posts')->count() == 0)
                        <div class="col-3 align-self-center mt-2">
                            <img src="{{ asset('app-assets/images/no_images.png') }}" alt="" class="card-img-top">
                        </div>
                    @else
                        <section id="basic-badges">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="demo-inline-spacing">
                                                @foreach ($post->getMedia('posts') as $image)
                                                    <div class="col-3">
                                                        <img class="card-img-top" src="{{ $image->getUrl() }}" alt="Card image cap">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                    @endif
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="author-info">
                                <small class="text-muted me-25">by</small>
                                <small><a href="#" class="text-body">{{ $post->user->username }}</a></small>
                                <span class="text-muted ms-50 me-25">|</span>
                                <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                                <small class="text-muted me-25">| in zipcode: </small>
                                <small class="text-muted">{{ $post->zipcode }}</small>
                            </div>
                        </div>
                        <div class="my-1 py-25">
                           @include('partials.report-modal')
                            <a href="#">
                                <span data-bs-toggle="modal" data-bs-target="#danger" class="badge rounded-pill badge-light-danger me-50"><i data-feather='alert-triangle'></i> Report</span>
                            </a>
                        </div>
                        <p class="card-text mb-2">
                            {{ $post->content }}
                        </p>
                        <hr class="my-2" />
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Number of Views" class="d-flex align-items-center me-1">
                                    <i data-feather="eye" class="font-medium-5 text-body align-middle"></i>

                                </div>
                                {{ views($post)->count() }}
                            </div>
                            <div>
                                <button data-bs-toggle="modal" data-bs-target="#large" type="button" class="btn btn-primary waves-effect waves-float waves-light">REPLY</button>
                                @include('partials.reply-modal')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Blog -->
        </div>
    </div>
    <!--/ Blog Detail -->
</x-layouts.app>
