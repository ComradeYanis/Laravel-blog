@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ $post->name }}

                        <span class="pull-right">
                            {{ $post->created_at->toDayDateTimeString() }}
                        </span>
                    </div>

                    <div class="panel-body">
                        <img src="{{'/images/'.$post->image}}" style="max-width: 100%; max-height: 100%" alt="image">
                        <p>{{ $post->content }}</p>
                        <p>
                            Category: <span class="label label-success">{{ $post->category->name }}</span> <br>
                        </p>
                    </div>
                </div>

                @include('frontend._form')

                @include('frontend._comments')

            </div>

            @include('layouts._sidebar')

        </dev>
    </dev>
@endsection
