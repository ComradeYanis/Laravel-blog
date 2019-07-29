@extends('layouts.app')

@section('content')

    <div class="card mb-4">
        <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
        <div class="card-body">
            <h2 class="card-title">{{$post->name}}</h2>
            <p class="card-text">{{$post->content}}</p>

            @include('frontend._form')

            @include('frontend._comments')

        </div>
        <div class="card-footer text-muted">
            <p>
                Category: <span class="label label-success">{{ $post->category->name }}</span> <br>
            </p>
            <p>{{ $post->created_at->toDayDateTimeString() }}</p>
        </div>
    </div>
@endsection
