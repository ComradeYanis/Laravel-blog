@forelse ($selected_category->comments as $comment)
    <div class="panel panel-default">
        <div class="panel-heading">
            {{ $comment->author }} says...

            <span class="pull-right">{{ $comment->created_at->diffForHumans() }}</span>
        </div>

        <div class="panel-body">
            <p>{{ $comment->content }}</p>
        </div>
    </div>
@empty
    <div class="panel panel-default">
        <div class="panel-heading">Not Found!!</div>

        <div class="panel-body">
            <p>Sorry! No comment found for this post.</p>
        </div>
    </div>
@endforelse
