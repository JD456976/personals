<x-layouts.auth>
    <x-slot name="title">
        Reset Password
    </x-slot>
    <!-- Reset Password basic -->
    <div class="card mb-0">
        <div class="card-body">
            <div class="text-center">
                <a href="{{ route('home') }}" class="brand-logo" style="font-size:52px;">
                    🌚🌝
                </a>
            </div>
            <h4 class="card-title mb-1 text-center">Reset Password 🔒</h4>

            {!! Form::open(['url' => 'reset-password', 'method' => 'post', 'class' => 'auth-reset-password-form mt-2']) !!}
            {!! Form::hidden('token', request()->route('token')) !!}
                <div class="mb-1">
                    {!! Form::label('email', 'Email', ['class' => 'form-label']) !!}
                    {!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => 'your@email.com']) !!}
                    @error('email')
                    <x-alert type="danger" :message="$message" />
                    @enderror
                </div>
                <div class="mb-1">
                    <div class="d-flex justify-content-between">
                        {!! Form::label('password', 'New Password', ['class' => 'form-label']) !!}
                    </div>
                    <div class="input-group input-group-merge form-password-toggle">
                        <div class="input-group input-group-merge form-password-toggle">
                            {!! Form::password('password', ['class' => 'form-control form-control-merge', 'placeholder' => '&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;']) !!}
                            <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                        </div>

                    </div>
                    @error('password')
                    <x-alert type="danger" :message="$message" />
                    @enderror
                </div>
                <div class="mb-1">
                    <div class="d-flex justify-content-between">
                        {!! Form::label('password_confirmation', 'Confirm Password', ['class' => 'form-label']) !!}
                    </div>
                    <div class="input-group input-group-merge form-password-toggle">
                        <div class="input-group input-group-merge form-password-toggle">
                            {!! Form::password('password_confirmation', ['class' => 'form-control form-control-merge', 'placeholder' => '&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;']) !!}
                            <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                        </div>

                    </div>
                    @error('password_confirmation')
                    <x-alert type="danger" :message="$message" />
                    @enderror
                </div>
                {!! Form::submit('Set New Password', ['class' => 'btn btn-primary w-100']) !!}
                {!! Form::close() !!}

            <p class="text-center mt-2">
                <a href="{{ route('login') }}"> <i data-feather="chevron-left"></i> Back to login </a>
            </p>
        </div>
    </div>
    <!-- /Reset Password basic -->
</x-layouts.auth>
