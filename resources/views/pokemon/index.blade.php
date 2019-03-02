@extends("layouts.master")

@section("content")
    <main class="container pt-2">
        <div class="card-columns">
            @foreach($pokemons as $pokemon)
                <div class="card">
                    {{--<img class="card-img-top" src="{{$entrenador->imagen}}" alt="Card image cap">--}}
                    <div class="card-body">
                        <h5 class="card-title">{{$pokemon->nombre}} con id {{$pokemon->id}}</h5>
                        <p class="card-text">Su entrenador/a es {{\App\User::find($pokemon->user_id)->name}}</p>
                        <p class="card-text">Su tipo es {{$pokemon->tipo}}</p>
                        <p class="card-text"><small class="text-muted">Capturado en: {{$pokemon->created_at}}</small></p>
                        @if(Auth::user()->id == $pokemon->user_id)
                        <a class="btn btn-warning" href="{{action('PokemonController@editar', $pokemon->id)}}"><i class="fas fa-edit"></i> Editar</a>
                            <a class="btn btn-danger" href="{{action('PokemonController@eliminar', $pokemon->id)}}"><i class="fas fa-trash-alt"></i> Eliminar</a>

                        @endif()
                        {{--<a class="btn btn-warning" href="{{action('UsersControllers@editar', $entrenador->id)}}">Editar</a>--}}
                        {{--@if(Auth::user()->rol=='admin')--}}
                        {{--<a class="btn btn-danger ml-2" href="{{action('UsersControllers@eliminar', $entrenador->id)}}">Borrar</a>--}}
                        {{--@endif--}}
                    </div>
                </div>
            @endforeach
        </div>
    </main>

@endsection

