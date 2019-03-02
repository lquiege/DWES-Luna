@extends("layouts.master")

@section("content")
    <main class="container pt-2">
        <div class="card-columns">
            @foreach($medallas as $medalla)
                <div class="card">
                    {{--<img class="card-img-top" src="{{$entrenador->imagen}}" alt="Card image cap">--}}
                    <div class="card-body">
                        <h5 class="card-title">Medalla {{$medalla->nombreMedalla}}</h5>
                        {{--<p class="card-text">Su número es {{$entrenador->telefono}}</p>--}}
                        <p class="card-text"><small class="text-muted">Creada: {{$medalla->created_at}}</small></p>
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

