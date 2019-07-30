@extends('backend.layouts.app')

@section('content')
    <div class="page-header">
        <h1>@lang('dashboard.comments')</h1>
    </div>

    @include ('backend/comments/_list')
@endsection
