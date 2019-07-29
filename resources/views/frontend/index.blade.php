@extends('layout')
@section('content')
    <h3 class="pb-4 mb-4 font-italic border-bottom">
        From the Firehose
    </h3>

    @forelse($posts as $post)
        <!-- Blog Post -->
        <div class="card mb-4">
            <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
            <div class="card-body">
                <h2 class="card-title">{{$post->name}}</h2>
                <p class="card-text">{{str_limit($post->content, 200)}}</p>
                <a href="{{url("/posts/{$post->id}")}}" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
                {{$post->created_at->toDayDAteTimeString()}} in category"
                <a href=" {{url("/categories/{$post->category->id}")}}">{{$post->category->name}}"</a>
            </div>
        </div>
    @empty
        <div class="blog-post">
            <h1>No posts found</h1>
        </div>
    @endforelse

    <div class="blog-pagination">
        {!! $posts->appends(['search' => request()->get('search')])->links() !!}
    </div>


@endsection
