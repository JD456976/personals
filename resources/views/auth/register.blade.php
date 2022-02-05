<x-layouts.auth>
    <x-slot name="title">
        Register
    </x-slot>
    <!-- Register basic -->
    <div class="card mb-0">
        <div class="card-body">
            <a href="{{ route('home') }}" class="brand-logo" style="font-size:52px;">
                🌚🌝
            </a>
            @if (session('status'))
                <x-alert type="success" :message="session('status')" />
            @endif
            <h4 class="card-title mb-1 text-center">Your adventure starts here 🚀</h4>
            {!! Form::open(['route' => 'register', 'method' => 'post', 'class' => 'auth-register-form mt-2']) !!}
                <div class="mb-1">
                    {!! Form::label('email', 'Email', ['class' => 'form-label']) !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => 'your@email.com']) !!}
                    @error('email')
                    <x-alert type="danger" :message="$message" />
                    @enderror
                </div>
                <div class="mb-1">
                    {!! Form::label('password', 'Password', ['class' => 'form-label']) !!}
                    <div class="input-group input-group-merge form-password-toggle">
                        {!! Form::password('password', ['class' => 'form-control form-control-merge', 'placeholder' => '&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;']) !!}
                        <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                    </div>
                    @error('password')
                    <x-alert type="danger" :message="$message" />
                    @enderror
                </div>
            <div class="mb-1">
                {!! Form::label('password_confirmation', 'Confirm Password', ['class' => 'form-label']) !!}
                <div class="input-group input-group-merge form-password-toggle">
                    {!! Form::password('password_confirmation', ['class' => 'form-control form-control-merge', 'placeholder' => '&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;']) !!}
                    <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                </div>
                @error('password_confirmation')
                <x-alert type="danger" :message="$message" />
                @enderror
            </div>
                <div class="mb-1">
                    <div class="form-check">
                        {!! Form::checkbox('tos', '1', null,  ['id' => 'tos', 'class' => 'form-check-input']) !!}
                        <label class="form-check-label" for="register-privacy-policy">
                            I agree to <a href="#">privacy policy & terms</a>
                        </label>
                    </div>
                    @error('tos')
                    <x-alert type="danger" :message="$message" />
                    @enderror
                </div>
                {!! Form::submit('Sign Up', ['class' => 'btn btn-primary w-100']) !!}
                {!! Form::close() !!}

            <p class="text-center mt-2">
                <span>Already have an account?</span>
                <a href="{{ route('login') }}">
                    <span>Sign in instead</span>
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
                <a href="#" class="btn btn-google">
                    <i data-feather="mail"></i>
                </a>
                <a href="#" class="btn btn-github">
                    <i data-feather="github"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- /Register basic -->
</x-layouts.auth>
