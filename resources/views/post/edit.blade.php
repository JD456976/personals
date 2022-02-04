<x-layouts.app>
    <x-slot name="title">
        Editing Post: {{ $post->title }}
    </x-slot>
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Editing Post: {{ $post->title }}</h2>
                </div>
            </div>
        </div>
    </div>
    <section id="input-group-basic">
        <div class="row justify-content-center">
            <!-- Basic -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => ['post.update', $post->slug], 'method' => 'patch', 'files' => true]) !!}

                        {!! Form::label('title', 'Title', ['class' => 'form-label']) !!}
                        <div class="input-group mb-2">
                            {!! Form::text('title', old('title') ?? $post->title, ['class' => 'form-control', 'placeholder' => 'Your Title']) !!}
                        </div>
                        @error('title')
                        <x-alert type="danger" :message="$message" />
                        @enderror

                        {!! Form::label('zipcode', 'Your Zipcode', ['class' => 'form-label']) !!}
                        <div data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Enter the zipcode you would like this
                                post to be found by" class="input-group mb-2">
                            {!! Form::text('zipcode', old('zipcode'), ['class' => 'form-control', 'placeholder' => 'Your Zipcdoe']) !!}
                        </div>
                        @error('zipcode')
                        <x-alert type="danger" :message="$message" />
                        @enderror

                        {!! Form::label('content', 'Content', ['class' => 'form-label']) !!}
                        <div class="input-group mb-2">
                            {!! Form::textarea('content', old('content') ?? $post->content, ['class' => 'form-control', 'placeholder' => 'Your Content']) !!}
                        </div>
                        @error('content')
                        <x-alert type="danger" :message="$message" />
                        @enderror

                        {!! Form::label('category', 'Category', ['class' => 'form-label']) !!}
                        <div class="input-group mb-2">
                            {!! Form::select('category', $categories , $post->category_id, ['class' => 'select2 form-select']) !!}
                        </div>
                        @error('category')
                        <x-alert type="danger" :message="$message" />
                        @enderror

                        <div class="input-group mb-2">
                            <div id="app">
                                <file-uploader
                                    :media="{{ $post->getMediaResource('posts') }}"
                                    :max="5"
                                    :unlimited="true"
                                    collection="posts"
                                    :tokens="{{ json_encode(old('images', [])) }}"
                                    label="Upload Images"
                                    notes="Supported types: jpeg, png,jpg,gif"
                                    accept="image/jpeg,image/png,image/jpg,image/gif"
                                ></file-uploader>
                            </div>
                        </div>
                        @error('images')
                        <x-alert type="danger" :message="$message" />
                        @enderror

                        <div class="input-group">
                            {!! Form::submit('Submit', ['class' => 'btn btn-primary w-100']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('footer-scripts')
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/laravel-file-uploader"></script>
        <script>
            new Vue({
                el: '#app'
            })
        </script>
    @endpush
</x-layouts.app>
