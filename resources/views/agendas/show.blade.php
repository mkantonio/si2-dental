@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Detalle de Agenda:</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('agendas.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre Odontologo:</strong>
                <input placeholder="nombre" class="form-control" name="Nombre" type="text"
                    value="{{ $agenda->odontologo->persona->Nombre }} " readonly style="font-size:25px;"  style="font-size:25px;">
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Fecha:</strong>
                <input placeholder="apellido" class="form-control" name="Fecha" type="text"
                    value="{{ $agenda->Fecha }}" readonly style="font-size:25px;">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Hora:</strong>
                <input placeholder="apellido" class="form-control" name="Hora" type="text"
                    value="{{ $agenda->Hora }}" readonly style="font-size:25px;">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Disponibilidad:</strong>
                <input placeholder="direccion" class="form-control" name="Disponibilidad" type="text"
                    value="{{ $agenda->Disponibilidad }}" readonly style="font-size:25px;">
            </div>
        </div>

    </div>
@endsection
