@if (Auth::check())
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
@else
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            <i class="fa fa-user"></i>
            <span class="caret"></span>
        </a>
        <ul class="dropdown-menu" role="menu">
            <li><a href="{{route('login')}}">Iniciar sessió</a></li>
        </ul>
    </li>
@endif