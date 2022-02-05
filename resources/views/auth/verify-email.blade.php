<x-layouts.auth>
    <x-slot name="title">
        Verify Your Email
    </x-slot>
    <!-- verify email basic -->
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
            <h2 class="card-title fw-bolder mb-1 text-center">Verify your email ✉️</h2>
            <p class="card-text mb-2">
                We've sent a link to your email address: <span class="fw-bolder">{{ Auth::user()->email }}</span> Please follow the
                link inside to continue.
            </p>

            <p class="text-center mt-2">
                <span>Didn't receive an email? </span>
                {!! Form::open(['url' => '/email/verification-notification', 'method' => 'post']) !!}
                	{!! Form::submit('Send New Link', ['class' => 'btn btn-primary w-100']) !!}
                {!! Form::close() !!}
            </p>
        </div>
    </div>
    <!-- / verify email basic -->
</x-layouts.auth>
