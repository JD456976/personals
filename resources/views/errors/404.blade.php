<x-layouts.auth>
    <x-slot name="title">
        Login
    </x-slot>
    <!-- Login basic -->
    <div class="card mb-0">
        <div class="card-body">
            <div class="text-center">
                <a href="{{ route('home') }}" class="brand-logo" style="font-size:52px;">
                    🌚🌝
                </a>
            </div>
            <h4 class="card-title mb-1 text-center">Welcome Back! 👋</h4>
            <p class="card-text mb-2">Please sign-in to your account to continue the adventure</p>
            {!! Form::open(['route' => 'login', 'method' => 'post', 'class' => 'auth-login-form mt-2']) !!}
            <div class="mb-1">
                {!! Form::label('email', 'Email', ['class' => 'form-label']) !!}
                {!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => 'your@email.com']) !!}
                @error('email')
                <x-alert type="danger" :message="$message" />
                @enderror
            </div>
            <div class="mb-1">
                <div class="d-flex justify-content-between">
                    {!! Form::label('password', 'Password', ['class' => 'form-label']) !!}
                    <a href="{{ url('forgot-password') }}">
                        <small>Forgot Password?</small>
                    </a>
                </div>
                <div class="input-group  form-password-toggle">
                    {!! Form::password('password', ['class' => 'form-control form-control-merge', 'placeholder' => '&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;']) !!}
                    <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                </div>
                @error('password')
                <x-alert type="danger" :message="$message" />
                @enderror
            </div>
            <div class="mb-1">
                <div class="form-check">
                    {!! Form::checkbox('remember', '1', null,  ['id' => 'name', 'class' => 'form-check-input']) !!}
                    {!! Form::label('remember', 'Remember Me', ['class' => 'form-check-label']) !!}
                </div>
            </div>
            <x-button text="Submit" type="primary" />
            {!! Form::close() !!}

            <p class="text-center mt-2">
                <span>New on our platform?</span>
                <a href="{{ route('register') }}">
                    <span>Create an account</span>
                </a>
            </p>

            <div class="divider my-2">
                <div class="divider-text">or</div>
            </div>

            <div class="auth-footer-btn d-flex justify-content-center">
                <a href="#" class="btn btn-facebook">
                    <i data-feather="facebook"></i>
                </a>
                <a href="#" class="btn btn-twitter white">
                    <i data-feather="twitter"></i>
                </a>
                <a href="{{ url('auth/google') }}" class="btn btn-google">
                    <i data-feather="mail"></i>
                </a>
                <a href="#" class="btn btn-github">
                    <i data-feather="github"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- /Login basic -->
</x-layouts.auth>
