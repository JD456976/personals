<x-layouts.admin>
    <x-slot name="title">
        Editing Page: {{ $page->title }}
    </x-slot>
    <section id="basic-horizontal-layouts">
        <div class="row justify-content-center">
            <div class="col-md-8 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Editing Page: {{ $page->title }}</h4>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => ['admin.page.update', $page->slug], 'method' => 'patch', 'class' => 'form form-horizontal']) !!}
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-3">
                                        {!! Form::label('title', 'Title', ['class' => 'col-form-label']) !!}
                                    </div>
                                    <div class="col-sm-9">
                                        {!! Form::text('title', old('title') ?? $page->title, ['class' => 'form-control', 'placeholder' => 'Page Title']) !!}
                                    </div>
                                    @error('title')
                                    <x-alert type="danger" :message="$message" />
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-3">
                                        {!! Form::label('slug', 'Slug', ['class' => 'col-form-label']) !!}
                                    </div>
                                    <div class="col-sm-9">
                                        {!! Form::text('slug', old('slug') ?? $page->slug, ['class' => 'form-control', 'placeholder' => 'Page Slug']) !!}
                                    </div>
                                    @error('slug')
                                    <x-alert type="danger" :message="$message" />
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-3">
                                        {!! Form::label('content', 'Content', ['class' => 'col-form-label']) !!}
                                    </div>
                                    <div class="col-sm-9">
                                        {!! Form::textarea('content', old('content') ?? $page->content, ['class' => 'form-control', 'placeholder' => 'Page Content', 'id' => 'editor']) !!}
                                    </div>
                                    @error('content')
                                    <x-alert type="danger" :message="$message" />
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-9 offset-sm-3">
                                <div class="mb-1">
                                    <div class="demo-inline-spacing">
                                        <div class="form-check">
                                            {!! Form::checkbox('is_active', '1', ($page->is_active == 1) ? true : false,  ['id' => 'is_active', 'class' => 'form-check-input']) !!}
                                            {!! Form::label('is_active', 'Active', ['class' => 'form-check-label']) !!}
                                        </div>
                                        <div class="form-check">
                                            {!! Form::checkbox('main_menu', '1', ($page->main_menu == 1) ? true : false,  ['id' => 'is_active', 'class' => 'form-check-input']) !!}
                                            {!! Form::label('main_menu', 'Main Menu', ['class' => 'form-check-label']) !!}
                                        </div>
                                        <div class="form-check">
                                            {!! Form::checkbox('footer_menu', '1', ($page->footer_menu == 1) ? true : false,  ['id' => 'is_active', 'class' => 'form-check-input']) !!}
                                            {!! Form::label('footer_menu', 'Footer Menu', ['class' => 'form-check-label']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-9 offset-sm-3">
                                {!! Form::submit('Update', ['class' => 'btn btn-primary me-1 waves-effect waves-float waves-light']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}

                        {!! Form::open(['route' => ['admin.page.destroy', $page->slug], 'method' => 'delete']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger me-1 waves-effect waves-float waves-light']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('footer-scripts')
        <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .catch( error => {
                    console.error( error );
                } );
        </script>
    @endpush
</x-layouts.admin>
