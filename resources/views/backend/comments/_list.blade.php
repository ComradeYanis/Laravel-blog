<table class="table table-striped table-sm table-responsive-md">
    <thead>
    <tr>
        <th>Content</th>
        <th>Type</th>
        <th>Data ID</th>
        <th>Created at</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($comments as $comment)
        <tr>
            <td>{{ Str::limit($comment->content, 50) }}</td>
            <td>Tilte</td>
{{--            <td>{{ $comment->type === \App\Models\Comment::TYPE_POST_COMMENT ? link_to_route('backend.posts.edit', $comment->post->title, $comment->post) :  link_to_route('backend.category.edit', $comment->category->name, $comment->category)}}</td>--}}
            <td>{{$comment->created_at}}</td>
            <td>
                {!! Form::model($comment, ['method' => 'DELETE', 'route' => ['comments.destroy', $comment], 'class' => 'form-inline', 'data-confirm' => __('forms.comments.delete')]) !!}
                {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', ['class' => 'btn btn-danger btn-sm', 'name' => 'submit', 'type' => 'submit']) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $comments->links() }}
</div>
