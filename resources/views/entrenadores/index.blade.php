@extends("layouts.master")

@section("content")
    <main class="container pt-2">
        <div class="card-columns">
            @foreach($entrenadores as $entrenador)
                <div class="card">
                    <img class="card-img-top" src="{{$entrenador->imagen}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$entrenador->name}}</h5>
                        <p class="card-text">Su número es {{$entrenador->telefono}}</p>
                        @if(count($entrenador->medals()->get())>0)
                        <p class="card-text">Ha vencido/revalidado victoria en los siguientes desafios:
                            <u>
                                {{--Obtenemos las medallas de cada entrenador--}}
                            @foreach($entrenador->medals()->get() as $medalla)
                                   <li> <strong> {{$medalla->nombreMedalla}}</strong></li>
                                @endforeach
                            </u>

                        </p>
                        @endif
                        <p class="card-text"><small class="text-muted">Dado de alta el: {{$entrenador->created_at}}</small></p>
                        <a class="btn btn-warning" href="{{action('UsersControllers@editar', $entrenador->id)}}"> <i class="fas fa-user-edit"></i> Editar</a>
                        {{--@if(Auth::user()->rol=='admin')--}}
                        <a class="btn btn-danger ml-2" href="{{action('UsersControllers@eliminar', $entrenador->id)}}"> <i class="fas fa-user-times"></i> Borrar</a>
                            {{--@endif--}}
                    </div>
                </div>
            @endforeach
        </div>
    </main>

@endsection

