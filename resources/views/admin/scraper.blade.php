<x-layouts.admin>
    <x-slot name="title">
        Site Scraper
    </x-slot>
    <section id="basic-input">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Site Scraper</h4>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => 'admin.scrape', 'method' => 'post']) !!}
                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="mb-1">
                                    {!! Form::label('url', 'URL', ['class' => 'form-label']) !!}
                                    {!! Form::text('url', old('url'), ['class' => 'form-control', 'placeholder' => 'URL']) !!}
                                </div>
                            </div>
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="mb-1">
                                {!! Form::label('user', 'User', ['class' => 'form-label']) !!}
                                {!! Form::text('user', old('user'), ['class' => 'form-control', 'placeholder' => 'User']) !!}
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="mb-1">
                                {!! Form::label('password', 'Password', ['class' => 'form-label']) !!}
                                {!! Form::text('password', old('password'), ['class' => 'form-control', 'placeholder' => 'Password']) !!}
                            </div>
                        </div>
                            <div class="col-xl-4 col-md-6 col-12">
                                {!! Form::submit('Scrape', ['class' => 'btn btn-primary']) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.admin>
