@extends('layouts.app')

@section('content')
    <div class="container">

        @include('frontend._search')

        <div class="row">

            <div class="col-md-8">
                @forelse ($posts as $post)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            {{ $post->name }}

                            <span class="pull-right">
                                {{ $post->created_at->toDayDateTimeString() }}
                            </span>
                        </div>

                        <div class="panel-body">
                            <p>
                                <img src="{{'/images/'.$post->image}}" style="max-width: 100%; max-height: 100%" alt="image">
                            </p>
                            <p>{{ str_limit($post->content, 200) }}</p>
                            <p>
                                <span class="btn btn-sm btn-success">{{ $post->category->name }}</span>
                                <span class="btn btn-sm btn-info">Comments <span class="badge">{{ $post->comments_count }}</span></span>

                                <a href="{{ url("/posts/{$post->id}") }}" class="btn btn-sm btn-primary">See more</a>
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="panel panel-default">
                        <div class="panel-heading">Not Found!!</div>

                        <div class="panel-body">
                            <p>Sorry! No post found.</p>
                        </div>
                    </div>
                @endforelse

                <div align="center">
                    {!! $posts->appends(['search' => request()->get('search')])->links() !!}
                </div>

            </div>
            @include('layouts._sidebar')

        </div>
    </div>
@endsection
