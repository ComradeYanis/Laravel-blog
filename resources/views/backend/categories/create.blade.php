@extends('backend.layouts.app')

@section('content')
    <h1>@lang('categories.create')</h1>

    {!! Form::open(['route' => ['backend.categories.store'], 'method' =>'POST']) !!}
    @include('backend/categories/_form')

    {{ link_to_route('backend.categories.index', __('forms.actions.back'), [], ['class' => 'btn btn-secondary']) }}
    {!! Form::submit(__('forms.actions.save'), ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection
