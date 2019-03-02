<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="color: white;">
    <div class="container">
        <a class="navbar-brand text-light" href="/" style="color:#777"> Pokémon Laravel <i class="fab fa-laravel"></i></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

       @if(	Auth::check()	)
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{ Request::is('entrenadores') && ! Request::is('entrenadores/{id}')? 'active' : ''}}">
                        <a class="nav-link" href="{{url('/entrenadores')}}">
                            <span class="glyphicon glyphicon-film" aria-hidden="true"></span>
                            <i class="fas fa-list-ul"></i> Entrenadores
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('medallas') && ! Request::is('medallas/{id}')? 'active' : ''}}">
                        <a class="nav-link" href="{{url('/medallas')}}">
                            <span class="glyphicon glyphicon-film" aria-hidden="true"></span>
                            <i class="fas fa-list-ul"></i> Medallas
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('pokemons') && ! Request::is('pokemons/{id}')? 'active' : ''}}">
                        <a class="nav-link" href="{{url('/pokemons')}}">
                            <span class="glyphicon glyphicon-film" aria-hidden="true"></span>
                            <i class="fas fa-list-ul"></i> Pokémons
                        </a>
                    </li>
                    <li class="nav-item {{  Request::is('pokemons/nuevo') ? 'active' : ''}}">
                        <a class="nav-link" href="{{url('/pokemons/nuevo')}}">
                            <i class="fas fa-plus-circle"></i> Nuevo Pokémon
                        </a>
                    </li>
                    <li class="nav-item {{  Request::is('userMedal/nuevo') ? 'active' : ''}}">
                        <a class="nav-link" href="{{url('/userMedal/nuevo')}}">
                            <i class="fas fa-plus-circle"></i> Añadir medalla a entrenador
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav navbar-right">
                    <li class="nav-item">
                        <form action="{{ url('/logout') }}" method="POST" style="display:inline">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-link nav-link" style="display:inline;cursor:pointer">
                                <i class="fas fa-sign-out-alt"></i> Cerrar sesión
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        @endif

        @if(	!Auth::check()	)

            <ul class="navbar-nav navbar-right">
                <li class="nav-item pr-2">
                    <i class="fas fa-sign-in-alt"></i> <a style="color: white; text-decoration: none" href="{{url('/login')}}">Login</a>
                    {{--<form action="{{ url('/login') }}" method="get" style="display:inline">--}}
                        {{--{{ csrf_field() }}--}}
                        {{--<button type="submit" class="btn btn-link nav-link" style="display:inline;cursor:pointer">--}}
                           {{--Login--}}
                        {{--</button>--}}
                    {{--</form>--}}
                </li>
                <li class="nav-item">
                    <i class="fas fa-user-plus"></i>  <a style="color: white; text-decoration:none" href="{{url('/register')}}">Registro</a>
                    {{--<form action="{{ url('/register') }}" method="get" style="display:inline">--}}
                        {{--{{ csrf_field() }}--}}
                        {{--<button type="submit" class="btn btn-link nav-link" style="display:inline;cursor:pointer">--}}
                            {{--Registro--}}
                        {{--</button>--}}
                    {{--</form>--}}
                </li>
            </ul>
            @endif
    </div>
</nav>
