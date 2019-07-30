@php
    $posted_at = old('created_at') ?? (isset($post) ? $post->created_at->format('Y-m-d\TH:i') : null);
@endphp

<div class="form-group">
    {!! Form::label('name', __('posts.attributes.name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'required']) !!}

    @error('name')
    <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        {!! Form::label('category_id', __('posts.attributes.category_id')) !!}
        {!! Form::select('category_id', $users, null, ['class' => 'form-control' . ($errors->has('category_id') ? ' is-invalid' : ''), 'required']) !!}

        @error('category_id')
        <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="form-group">
    {!! Form::label('content', __('posts.attributes.content')) !!}
    {!! Form::textarea('content', null, ['class' => 'form-control trumbowyg-form' . ($errors->has('content') ? ' is-invalid' : ''), 'required']) !!}

    @error('content')
    <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>
