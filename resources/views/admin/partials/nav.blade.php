<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('admin-home')}}">Botiga web</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <p class="navbar-text"> <i class='fa fa-dashboard'></i>Backend Botiga Laravel</p>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{route('category.index')}}">Categories</a></li>
                <li><a href="#">Productes</a></li>
                <li><a href="#">Comandes</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <i class="fa fa-user"></i>
                        {{Auth::user()->name}}
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{route('logout')}}">Tancar sessió</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>