<x-layouts.auth>
    <x-slot name="title">
        Forgot Password
    </x-slot>
    <!-- Forgot Password basic -->
    <div class="card mb-0">
        <div class="card-body">
            <div class="text-center">
                <a href="{{ route('home') }}" class="brand-logo" style="font-size:52px;">
                    🌚🌝
                </a>
            </div>
            @if (session('status'))
                <x-alert type="success" :message="session('status')" />
            @endif
            <h4 class="card-title mb-1 text-center">Forgot Password? 🔒</h4>
            <p class="card-text mb-2">Enter your email, and we'll send you instructions to reset your password</p>

            {!! Form::open(['url' => 'forgot-password', 'method' => 'post', 'class' => 'auth-forgot-password-form mt-2']) !!}
                <div class="mb-1">
                    {!! Form::label('email', 'Email', ['class' => 'form-label']) !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => 'your@email.com']) !!}
                    @error('email')
                    <x-alert type="danger" :message="$message" />
                    @enderror
                </div>
                {!! Form::submit('Send Reset Link', ['class' => 'btn btn-primary w-100']) !!}
                {!! Form::close() !!}
            <p class="text-center mt-2">
                <a href="{{ route('login') }}"> <i data-feather="chevron-left"></i> Back to login </a>
            </p>
        </div>
    </div>
    <!-- /Forgot Password basic -->
</x-layouts.auth>
