<ul class="navbar-nav navbar-sidenav">

    <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="Posts">
        <a class="nav-link {{ request()->route()->named('backend.posts.*') ? 'active' : '' }}" href="{{ route('posts.index') }}">
            <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
            <span class="nav-link-text">Posts</span>
        </a>
    </li>

    <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="Comments">
        <a class="nav-link {{ request()->route()->named('backend.comments.*') ? 'active' : '' }}" href="{{ route('comments.index') }}">
            <i class="fa fa-comments" aria-hidden="true"></i>&nbsp;
            <span class="nav-link-text">Comments</span>
        </a>
    </li>

    <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="Categories">
        <a class="nav-link {{ request()->route()->named('backend.categories.*') ? 'active' : '' }}" href="{{ route('categories.index') }}">
            <i class="fa fa-users" aria-hidden="true"></i>&nbsp;
            <span class="nav-link-text">Categories</span>
        </a>
    </li>

</ul>

<ul class="navbar-nav sidenav-toggler">
    <li class="nav-item">
        <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
        </a>
    </li>
</ul>
