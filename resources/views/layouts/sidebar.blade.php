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
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" style="margin-top: auto; border-top: 1px solid #dee2e6; padding-top: 1rem;">
        <li class="nav-item">
            <span class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>{{ Auth::user()->name }}</p>
            </span>
        </li>
        <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>Logout</p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
    @endauth
</ul>
