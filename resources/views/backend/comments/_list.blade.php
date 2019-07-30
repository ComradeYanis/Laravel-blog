<table class="table table-striped table-sm table-responsive-md">
    <caption>{{ trans_choice('comments.count', $comments->total()) }}</caption>
    <thead>
    <tr>
        <th>@lang('comments.attributes.content')</th>
        <th>@lang('comments.attributes.type')</th>
        <th>@lang('comments.attributes.data_id')</th>
        <th>@lang('comments.attributes.created_at')</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($comments as $comment)
        <tr>
            <td>{{ Str::limit($comment->content, 50) }}</td>
            <td>{{ $comment->type === \App\Models\Comment::TYPE_POST_COMMENT ? link_to_route('backend.posts.edit', $comment->post->title, $comment->post) :  link_to_route('backend.category.edit', $comment->category->name, $comment->category)}}</td>
            <td>{{ humanize_date($comment->created_at, 'd/m/Y H:i:s') }}</td>
            <td>
                {!! Form::model($comment, ['method' => 'DELETE', 'route' => ['backend.comments.destroy', $comment], 'class' => 'form-inline', 'data-confirm' => __('forms.comments.delete')]) !!}
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
