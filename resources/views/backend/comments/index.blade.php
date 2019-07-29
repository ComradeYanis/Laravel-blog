@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Type</th>
                                <th>Data</th>
                                <th>Comment</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($comments as $comment)
                                <tr>
                                    <td>{{ $comment->typeTitle }}</td>
                                    <td>{{ $comment->data->title }}</td>
                                    <td>{{ $comment->body }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">No comment available.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>

                        {!! $comments->links() !!}

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
