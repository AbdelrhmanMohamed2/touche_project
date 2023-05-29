<nav id="menu" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span
                    class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            <a class="navbar-brand page-scroll" href="#page-top">Touché</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ route('home.index') }}" class="page-scroll">Home</a></li>
                <li><a href="{{ route('home.menu') }}" class="page-scroll">Menu</a></li>
                <li><a href="{{ route('home.gallery') }}" class="page-scroll">Gallery</a></li>
                <li><a href="{{ route('home.chefs') }}" class="page-scroll">Chefs</a></li>
                <li><a href="{{ route('home.contact') }}" class="page-scroll">Contact</a></li>

                @auth
                    @if (auth()->user()->role == 'admin')
                        <li><a href="{{ route('admin.index') }}" class="page-scroll">Admin panel</a></li>
                    @endif
                    <li>

                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <input type="submit" class="btn btn-link" value="Logout">
                        </form>
                    </li>
                @endauth
                @guest
                    <li><a href="{{ route('users.login.page') }}" class="page-scroll">Login</a></li>

                @endguest

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
</nav>
