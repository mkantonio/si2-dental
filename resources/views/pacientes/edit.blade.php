@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Editar Informacion:</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('pacientes.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <form method="POST" action="{{ route('pacientes.update', $persona->id) }}" accept-charset="UTF-8"
        enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Ci:</strong>
                    <input placeholder="ci" class="form-control" name="ci" type="number" value="{{$persona->CI}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input placeholder="nombre" class="form-control" name="nombre" type="text" value="{{$persona->Nombre}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Apellido:</strong>
                    <input placeholder="apellido" class="form-control" name="apellido" type="text" value="{{$persona->Apellido}}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Sexo:</strong>
                    <select class="form-control" name="sexo" id="sexo">
                    <option value="Masculino" {{($persona->Sexo=='Masculino') ? 'selected="selected"' : ''}}>Masculino</option>
                    <option value="Femenino" {{($persona->Sexo=='Femenino') ? 'selected="selected"' : ''}}>Femenino</option>
                    </select>
                    {{-- <input placeholder="sexo" class="form-control" name="sexo" type="text" value="{{$persona->Sexo}}"> --}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Direccion:</strong>
                    <input placeholder="direccion" class="form-control" name="direccion" type="text" value="{{$persona->Direccion}}">
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Aceptar</button>
            </div>
        </div>

    </form>



@endsection
