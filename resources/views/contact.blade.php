<x-layouts.app>
    <x-slot name="title">
        Contact Us
    </x-slot>
    <!-- Leave a Blog Comment -->
    <div class="col-12 mt-1">
        <h4>Contact Us</h4>
        <div class="card">
            <div class="card-body">
                {!! Form::open(['route' => 'contact.send', 'method' => 'post']) !!}
                    <div class="row">
                        <div class="col-sm-6 col-12">
                            <div class="mb-2">
                                {!! Form::label('name', 'Name', ['class' => 'form-label']) !!}
                                {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Your Name']) !!}
                                @error('name')
                                <x-alert type="danger" :message="$message" />
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="mb-2">
                                {!! Form::label('email', 'Email', ['class' => 'form-label']) !!}
                                {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => 'Your Email']) !!}
                                @error('email')
                                <x-alert type="danger" :message="$message" />
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="mb-2">
                                {!! Form::label('phone', 'Phone', ['class' => 'form-label']) !!}
                                {!! Form::text('phone', old('phone'), ['class' => 'form-control', 'placeholder' => 'Your Phone']) !!}
                                @error('phone')
                                <x-alert type="danger" :message="$message" />
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            {!! Form::label('message', 'Message', ['class' => 'form-label']) !!}
                            {!! Form::textarea('message', old('message'), ['class' => 'form-control', 'placeholder' => 'Your Message']) !!}
                            @error('message')
                            <x-alert type="danger" :message="$message" />
                            @enderror</div>
                        <div class="col-12 mt-2">
                            {!! Form::submit('Send', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!--/ Leave a Blog Comment -->
</x-layouts.app>
