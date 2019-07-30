<table class="table table-striped table-sm table-responsive-md">
    <caption>{{ trans_choice('posts.count', $posts->total()) }}</caption>
    <thead>
    <tr>
        <th>@lang('posts.attributes.name')</th>
        <th>@lang('posts.attributes.created_at')</th>
        <th><i class="fa fa-comments" aria-hidden="true"></i></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
        <tr>
            <td>{{ $post->title }}</td>
            <td>{{ $post->created_at }}</td>
            <td><span class="badge badge-pill badge-secondary">{{ $post->comments_count }}</span></td>
            <td>
                <a href="{{ route('backend.posts.edit', $post) }}" class="btn btn-primary btn-sm">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                </a>

                {!! Form::model($post, ['method' => 'DELETE', 'route' => ['backend.posts.destroy', $post], 'class' => 'form-inline', 'data-confirm' => __('forms.posts.delete')]) !!}
                {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', ['class' => 'btn btn-danger btn-sm', 'name' => 'submit', 'type' => 'submit']) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $posts->links() }}
</div>
