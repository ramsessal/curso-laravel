<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
    <li class="nav-item">
        <a href="/posts" class="nav-link">
            <i class="nav-icon fas fa-newspaper"></i>
            <p>Posts</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/posts/create" class="nav-link">
            <i class="nav-icon fas fa-pen"></i>
            <p>Nuevo Post</p>
        </a>
    </li>
</ul>

@auth
<div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
    </div>
</div>
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="btn btn-danger btn-sm">Logout</button>
</form>
@endauth
