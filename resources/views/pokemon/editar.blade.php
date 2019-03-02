@extends("layouts.master")

@section("content")


    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-2">
                <h1 class="panel panel-default"></h1>
                <h1 class="pl-2">Editar Pokémon</h1>
                <hr class="my-4">

                <div class="panel-body justify-content-center">
                    <form class="form-horizontal" method="POST">
                        {{method_field('PUT')}}
                        {{-- TODO: Abrir el formulario e indicar el método POST --}}

                        {{-- TODO: Protección contra CSRF --}}
                        {{ csrf_field() }}


                        <div class="form-group{{ $errors->has('userId') ? ' has-error' : '' }} col-md-6">
                            <label for="userId" class="col-md-4 control-label">Entrenador</label>
                            <?php $nombreEntrenador = $pokemon->user()->first() ?>
                            <select class="form-control" name="userId" id="userId" >
                                @foreach(\App\User::all() as $entrenador)
                                    @if($nombreEntrenador->name == $entrenador->name)
                                    <option selected="selected" value="{{$entrenador->id}}">{{$entrenador->name}}</option>
                                    @else
                                        <option value="{{$entrenador->id}}">{{$entrenador->name}}</option>
                                        @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="nombre" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control" name="nombre" value="{{$pokemon->nombre}}" required autofocus>

                                @if ($errors->has('nombre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tipo') ? ' has-error' : '' }}">
                            <label for="tipo" class="col-md-4 control-label">Tipo</label>

                            <div class="col-md-6">
                                <input id="tipo" type="text" class="form-control" name="tipo" value="{{$pokemon->tipo}}" required >

                                @if ($errors->has('tipo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tipo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    Actualizar Pokémon
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>



@endsection