@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-8 margin-tb">
                <div class="pull-left">
                    <h2>Create Nueva Recepcionista</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('recepcionistas.index') }}"> Back</a>
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
        <form method="POST" action="{{ route('recepcionistas.store') }}" accept-charset="UTF-8">
            @csrf
            @method('POST')
            <div class="row">

                <div class="col-xs-8 col-sm-8 col-md-8">
                    <div class="form-group">
                        <strong>Ci:</strong>
                        <input placeholder="name" class="form-control" name="CI" type="number">
                    </div>
                </div>
    
    
                <div class="col-xs-8 col-sm-8 col-md-8">
                    <div class="form-group">
                        <strong>Nombre:</strong>
                        <input placeholder="name" class="form-control" name="Nombre" type="text">
                    </div>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8">
                    <div class="form-group">
                        <strong>Apellido:</strong>
                        <input placeholder="apellido" class="form-control" name="Apellido" type="text">
                    </div>
                </div>
    
                <div class="col-xs-8 col-sm-8 col-md-8">
                    <div class="form-group">
                        <strong>Sexo:</strong><br>
                        <label>Masculino</label>
                            <input type="radio" id="recepcionista" name="Sexo" value="Masculino" class="flat-red">
                        <br>
                        <label>Femenino</label>
                            <input type="radio" id="recepcionista" name="Sexo" value="Femenino" class="flat-red">
                        <br>
                    </div>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8">
                    <div class="form-group">
                        <strong>Direccion:</strong>
                        <input placeholder="direccion" class="form-control" name="Direccion" type="text">
                    </div>
                </div>

                <div class="col-xs-8 col-sm-8 col-md-8">
                    <div id="mainForm" name="mainForm" class="form-group">
                        <label>
                            recepcionista
                            <input type="radio" id="recepcionista" name="Recepcionista" onclick="clickrecepcionista()"
                                value="recepcionista" class="flat-red" checked>
                        </label>
                    </div>
                </div>

                <div id="formulariorecepcionista">
                    <div class="col-xs-8 col-sm-8 col-md-8">
                        <div class="form-group">
                            <strong>Email:</strong>
                            <input placeholder="email" class="form-control" name="Correo" type="email">
                        </div>
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

