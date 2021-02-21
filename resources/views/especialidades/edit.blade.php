@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Editar Informacion:</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('especialidades.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <form method="POST" action="{{route('especialidades.update', $especialidad->id)}}" accept-charset="UTF-8" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre:</strong>
                <input placeholder="nombre" class="form-control" name="nombre" type="text">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descripcion:</strong>
                <input placeholder="descripcion" class="form-control" name="descripcion" type="text">
            </div>
        </div>



        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Aceptar</button>
        </div>
      </div>

    </form>



@endsection
