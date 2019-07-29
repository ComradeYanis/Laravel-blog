<div class="panel panel-default">
    <div class="panel-heading">Write your comment</div>

    <div class="panel-body">
        {!! Form::open(['url' => "posts/{$post->id}/comment"]) !!}
        <div class="form-group{{ $errors->has('author') ? ' has-error' : '' }}">
                {!! Form::text('author', null, ['class' => 'form-control', 'required']) !!}

                <span class="help-block">
                    <strong>{{ $errors->first('author') }}</strong>
                </span>
        </div>
        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                {!! Form::textarea('content', null, ['class' => 'form-control', 'rows' => 3, 'required']) !!}

                <span class="help-block">
                    <strong>{{ $errors->first('content') }}</strong>
                </span>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Reply
            </button>
        </div>
        {!! Form::close() !!}
    </div>
</div>
