@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                            Sessions
                        </h2>
                    </div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>User Id</th>
                                    <th>IP</th>
                                    <th>Agent</th>
                                    <th>Last activity</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($sessions as $session)
                                    <tr>
                                        <td>{{ $session->user_id }}</td>
                                        <td>{{ $session->ip_address }}</td>
                                        <td>{{ $session->user_agent }}</td>
                                        <td>{{ $session->created_at->diffForHumans()." ($session->last_activity)" }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2">No comment available.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        {!! $sessions->links() !!}

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
