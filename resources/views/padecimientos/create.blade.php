@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create Nueva Especialidad</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('padecimientos.index') }}"> Back</a>
            </div>
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('padecimientos.store')}}" accept-charset="UTF-8">
        @csrf
        @method('POST')
    <div class="row">
        <div class="col-lg-6 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Nombre de la Enfermedad:</strong>
                <input placeholder="Nombre" class="form-control" name="nombre" type="text">
            </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Descripcion de la Enfermedad:</strong>
                <textarea placeholder="Apellido" class="form-control" name="descripcion" ></textarea>
            </div>
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
