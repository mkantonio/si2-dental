@extends('layouts.admin')

@section('content')
  <div class="container">
    <div class="row">
        <div class="col-lg-10 col-12 margin-tb">
            <div class="pull-left">
                <h2>Create Nueva Especialidad</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('especialidades.index') }}"> Back</a>
            </div>
        </div>
    </div>
    
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Error!</strong> Hay errores en los campos.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('especialidades.store')}}" accept-charset="UTF-8">
        @csrf
        @method('POST')
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-8">
            <div class="form-group">
                <strong>Nombre:</strong>
                <input placeholder="Nombre" class="form-control" name="Nombre" type="text">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-8">
            <div class="form-group">
                <strong>Descripción:</strong>
                <textarea placeholder="Descripcion de especialidad" class="form-control" name="Descripcion" ></textarea>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <div class="form-group">
                <button onclick="myFunction()" type="submit" class="btn btn-success">Aceptar</button>
            </div>
        </div>

    </div>

    </form>


@endsection
