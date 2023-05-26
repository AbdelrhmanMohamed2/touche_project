<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                    class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('home.index')}}" class="nav-link">End User</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('admin.index')}}" class="nav-link">Admin</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <form action="{{route('admin.logout')}}" method="post">
            @csrf
            <input type="submit" class="btn-sm btn-danger" value="Logout">
        </form>
        {{-- <a href="{{route('admin.logout')}}" class="btn-sm btn-danger">Logout</a> --}}
    </ul>
</nav>
