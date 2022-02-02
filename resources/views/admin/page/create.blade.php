<x-layouts.admin>
    <x-slot name="title">
        Create Site Page
    </x-slot>
    <section id="basic-horizontal-layouts">
        <div class="row justify-content-center">
            <div class="col-md-8 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create Site Page</h4>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => 'admin.page.store', 'method' => 'post', 'class' => 'form form-horizontal']) !!}
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-3">
                                            {!! Form::label('title', 'Title', ['class' => 'col-form-label']) !!}
                                        </div>
                                        <div class="col-sm-9">
                                            {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => 'Page Title']) !!}
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
                                            {!! Form::text('slug', old('slug'), ['class' => 'form-control', 'placeholder' => 'Page Slug']) !!}
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
                                            {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'placeholder' => 'Page Content', 'id' => 'editor']) !!}
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
                                                {!! Form::checkbox('is_active', '1', null,  ['id' => 'is_active', 'class' => 'form-check-input']) !!}
                                                {!! Form::label('is_active', 'Active', ['class' => 'form-check-label']) !!}
                                            </div>
                                            <div class="form-check">
                                                {!! Form::checkbox('main_menu', '1', null,  ['id' => 'is_active', 'class' => 'form-check-input']) !!}
                                                {!! Form::label('main_menu', 'Main Menu', ['class' => 'form-check-label']) !!}
                                            </div>
                                            <div class="form-check">
                                                {!! Form::checkbox('footer_menu', '1', null,  ['id' => 'is_active', 'class' => 'form-check-input']) !!}
                                                {!! Form::label('footer_menu', 'Footer Menu', ['class' => 'form-check-label']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-9 offset-sm-3">
                                    {!! Form::submit('Submit', ['class' => 'btn btn-primary me-1 waves-effect waves-float waves-light']) !!}
                                </div>
                            </div>
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
