@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-8 margin-tb">
                <div class="pull-left">
                    <h2>Crear nuevo Tratamiento</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('tratamiento.index') }}"> Back</a>
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
        <form method="POST" action="{{ route('tratamiento.store') }}" accept-charset="UTF-8">
            @csrf
            @method('POST')
            <div class="row">
   
                <div class="col-xs-8 col-sm-8 col-md-8">
                    <div class="form-group">
                        <strong>Nombre:</strong>
                        <input placeholder="Nombre" class="form-control" name="Nombre" type="text">
                    </div>
                </div>

                <div class="col-xs-8 col-sm-8 col-md-8">
                    <div class="form-group">
                        <strong>Costo:</strong>
                        <input placeholder="Costo" class="form-control" name="Costo" type="number">
                    </div>
                </div>

                <div class="col-xs-8 col-sm-8 col-md-8">
                    <div class="form-group">
                        <strong>Descripcion:</strong>
                        <input placeholder="Descripcion" class="form-control" name="Descripcion" type="text">
                    </div>
                </div>
    
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <div class="form-group">
                        <button onclick="myFunction()" type="submit" class="btn btn-success">Aceptar</button>
                    </div>
                </div>

            </div>
    </div>
    </form>


@endsection

