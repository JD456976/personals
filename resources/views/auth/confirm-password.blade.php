<x-layouts.auth>
    <x-slot name="title">
        Confirm Your Password
    </x-slot>
    <!-- verify email basic -->
    <div class="card mb-0">
        <div class="card-body">
            <a href="{{ route('home') }}" class="brand-logo" style="font-size:52px;">
                🌚🌝
            </a>
            @if (session('status'))
                <x-alert type="success" :message="session('status')" />
            @endif
            <h2 class="card-title fw-bolder mb-1 text-center">Verify your password &#128274;</h2>

            <p class="text-center mt-2">
                {!! Form::open(['url' => '/user/confirm-password', 'method' => 'post','class' => 'auth-forgot-password-form mt-2']) !!}
                    <div class="mb-1">
                        <div class="d-flex justify-content-between">
                            {!! Form::label('password', 'Password', ['class' => 'form-label']) !!}
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
                {!! Form::submit('Confirm Password', ['class' => 'btn btn-primary w-100']) !!}
                {!! Form::close() !!}
            </p>
        </div>
    </div>
    <!-- / verify email basic -->
</x-layouts.auth>
