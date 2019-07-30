@extends('backend.layouts.app')

@section('content')
    <p>@lang('categories.show') : {{ link_to_route('categories.show', route('categories.show', $post), $post) }}</p>

    @include('backend/categories/_thumbnail')

    {!! Form::model($post, ['route' => ['backend.categories.update', $post], 'method' =>'PUT']) !!}
    @include('backend/categories/_form')

    <div class="pull-left">
        {{ link_to_route('backend.categories.index', __('forms.actions.back'), [], ['class' => 'btn btn-secondary']) }}
        {!! Form::submit(__('forms.actions.update'), ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

    {!! Form::model($post, ['method' => 'DELETE', 'route' => ['backend.categories.destroy', $post], 'class' => 'form-inline pull-right', 'data-confirm' => __('forms.categories.delete')]) !!}
    {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> ' . __('categories.delete'), ['class' => 'btn btn-link text-danger', 'name' => 'submit', 'type' => 'submit']) !!}
    {!! Form::close() !!}
@endsection
