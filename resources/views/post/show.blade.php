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
                    @if ($post->is_featured==1)
                        <span class="badge badge-glow bg-warning">
                          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star me-25"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                          <span>FEATURED</span>
                          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star me-25"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                        </span>
                    @endif
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
                                <small class="text-muted me-25">Posted:</small>
                                <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                                <small class="text-muted me-25">| in zipcode: </small>
                                <small class="text-muted">{{ $post->zipcode }}</small>
                            </div>
                        </div>
                        <div class="my-1 py-25">
                           @include('partials.report-modal')
                            @if ($reported  >= 1)
                                <span data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Already Reported" class="badge rounded-pill badge-light-secondary me-50"><i data-feather='alert-triangle'></i> Reported</span>
                            @else
                            <a href="#">
                                <span data-bs-toggle="modal" data-bs-target="#danger" class="badge rounded-pill badge-light-danger me-50"><i data-feather='alert-triangle'></i> Report</span>
                            </a>
                            @endif
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
                            @unless (Auth::user()->id != $post->user_id)
                                <div>
                                    <button data-bs-toggle="modal" data-bs-target="#large" type="button" class="btn btn-primary waves-effect waves-float waves-light">REPLY</button>
                                    @include('partials.reply-modal')
                                </div>
                            @endunless
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Blog -->
        </div>
    </div>
    <!--/ Blog Detail -->
</x-layouts.app>
