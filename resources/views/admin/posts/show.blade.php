@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                            {{ $post->name }}

                            <a href="{{ url('admin/posts') }}" class="btn btn-default pull-right">Go Back</a>
                        </h2>
                    </div>

                    <div class="panel-body">
                        <p>{{ $post->content }}</p>

                        <p><strong>Category: </strong>{{ $post->category->name }}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
