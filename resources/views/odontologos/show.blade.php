@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Informacion personal:</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('odontologos.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre:</strong>
                <input placeholder="nombre" class="form-control" name="nombre" type="text"
                    value="{{ $odontologo->persona->Nombre }} " readonly style="font-size:25px;"  style="font-size:25px;">
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Apellido:</strong>
                <input placeholder="apellido" class="form-control" name="apellido" type="text"
                    value="{{ $odontologo->persona->Apellido }}" readonly style="font-size:25px;">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Ci:</strong>
                <input placeholder="ci" class="form-control" name="ci" type="text" value="{{ $odontologo->persona->CI }}"
                    readonly style="font-size:25px;">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Sexo:</strong>
                <input placeholder="sexo" class="form-control" name="sexo" type="text"
                    value="{{ $odontologo->persona->Sexo }}" readonly style="font-size:25px;">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Direccion:</strong>
                <input placeholder="direccion" class="form-control" name="direccion" type="text"
                    value="{{ $odontologo->persona->Direccion }}" readonly style="font-size:25px;">
            </div>
        </div>

    </div>
@endsection
