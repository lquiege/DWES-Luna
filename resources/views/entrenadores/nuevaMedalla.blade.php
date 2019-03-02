@extends("layouts.master")

@section("content")


    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-2">
                <h1 class="panel panel-default"></h1>
                <h1 class="pl-2">Asignar/revalidar medalla</h1>
                <hr class="my-4">

                <div class="panel-body justify-content-center">
                    <form class="form-horizontal" method="POST">

                        {{-- TODO: Abrir el formulario e indicar el método POST --}}

                        {{-- TODO: Protección contra CSRF --}}
                        {{ csrf_field() }}


                        <div class="form-group{{ $errors->has('userId') ? ' has-error' : '' }} col-md-6">
                            <label for="userId" class="col-md-4 control-label">Entrenador</label>

                            <select class="form-control" name="userId" id="userId">
                                @foreach($entrenadores as $entrenador)
                                    <option value="{{$entrenador->id}}">{{$entrenador->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group{{ $errors->has('medalId') ? ' has-error' : '' }} col-md-6">
                            <label for="userId" class="col-md-4 control-label">Medalla</label>

                            <select class="form-control" name="medalId" id="medalId">
                                @foreach($medallas as $medalla)
                                    <option value="{{$medalla->id}}">{{$medalla->nombreMedalla}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Agregar medalla
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