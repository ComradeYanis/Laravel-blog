

<!-- Categories Widget -->
<div class="card my-4">
    <h5 class="card-header">Categories</h5>
    <div class="card-body">
        <ul class="list-unstyled mb-0 scroll">
            @foreach($categories as $category)
                <li><a href="/categories/{{$category->id}}">{{$category->name}}</a></li>
            @endforeach
        </ul>
    </div>
</div>
@if(isset($selected_category))
    <!-- Side Widget -->
    <div class="card my-4">
        <h5 class="card-header">{{$category->name}}</h5>
        <div class="card-body scroll">
            @include('layouts._comments')
        </div>
        <div class="card-footer">
            @include('layouts._form_comment')
        </div>
    </div>
@endif
