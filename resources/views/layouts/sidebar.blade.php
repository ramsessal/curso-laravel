<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
    <li class="nav-item">
        <a href="/posts" class="nav-link">
            <i class="nav-icon fas fa-newspaper"></i>
            <p>Posts</p>
        </a>
    </li>
    <li class="nav-item">
        @auth
        <a href="{{ route('posts.create') }}" class="nav-link">
            <i class="nav-icon fas fa-pen"></i>
            <p>Nuevo Post</p>
        </a>
        @endauth
    </li>
</ul>
