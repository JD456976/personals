<!-- Modal -->
<div class="modal fade modal-danger text-start" id="danger" tabindex="-1" aria-labelledby="myModalLabel120"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel120">Report Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {!! Form::open(['route' => ['report.post', $post->id], 'method' => 'post']) !!}
                <div class="modal-body">
                    {!! Form::label('reason', 'Reason', ['class' => 'control-label']) !!}
                    <div class="mb-1">
                        {!! Form::select('reason', [
                                            'spam' => 'Spam',
                                            'under' => 'Under Age',
                                            'service' => 'Sex Service Offered',
                                            'other' => 'Other'
                                        ] , null , ['class' => 'select2 form-select']) !!}
                    </div>
                    {!! Form::label('comment', 'Comment', ['class' => 'control-label']) !!}
                    <div class="mb-1">
                        {!! Form::text('comment', old('comment'), ['class' => 'form-control']) !!}
                    </div>
                    @error('comment')
                    <x-alert type="danger" :message="$message" />
                    @enderror
                </div>
            <div class="modal-footer">
                {!! Form::submit('Submit', ['class' => 'btn btn-danger']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
