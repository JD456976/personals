<div class="modal fade text-start" id="large" tabindex="-1" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel17">Replying To: {{ $post->title }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {!! Form::open(['route' => ['post.reply', $post->id], 'method' => 'post']) !!}
            <div class="modal-body">
                {!! Form::label('from', 'Your Email', ['class' => 'control-label']) !!}
                <div class="mb-1">
                    {!! Form::email('email', old('email') ?? Auth::user()->email, ['class' => 'form-control', 'placeholder' => 'Your Email Address']) !!}
                    <small class="text-muted">This will be the email address the poster will reply to</small>
                    @error('email')
                    <x-alert type="danger" :message="$message" />
                    @enderror
                </div>
                {!! Form::label('message', 'Your Message', ['class' => 'control-label']) !!}
                <div class="mb-1">
                    {!! Form::textarea('message', old('message'), ['class' => 'form-control', 'placeholder' => 'Your Message']) !!}
                    @error('message')
                    <x-alert type="danger" :message="$message" />
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                {!! Form::submit('Send Reply', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
