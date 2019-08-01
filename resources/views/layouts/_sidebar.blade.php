

<!-- Categories Widget -->
<div class="col-md-4">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h5 class="card-header">Categories</h5>
        </div>
        <div class="panel-body">
            <ul class="list-unstyled mb-0 scroll">
                @foreach($categories as $category)
                    <li><a href="/categories/{{$category->id}}">{{$category->name}}</a></li>
                @endforeach
            </ul>
        </div>
        @if(isset($selected_category))
            <div class="panel-footer">
                <div class="card my-6">
                    <h3 class="card-header"><b>{{$category->name}}</b></h3>
                    <div class="card-body scroll" style="margin-bottom: 25px">
                        @include('layouts._comments')
                    </div>
                    <div class="card-footer">
                        @include('layouts._form_comment')
                    </div>
                </div>
            </div>
        @endif
    </div>

</div>
