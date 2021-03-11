@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Editar Agenda de Odontologo:</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('agendas.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <form method="POST" action="{{ route('agendas.update', $agenda->id) }}" accept-charset="UTF-8"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombre Odontologo:</strong>
                    <input placeholder="nombre" class="form-control" readonly name="Nombre" type="text"
                        value="{{ $agenda->odontologo->persona->Nombre }} " style="font-size:25px;"
                        style="font-size:25px;">
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Fecha:</strong>
                    <input placeholder="apellido" class="form-control" name="Fecha" type="date"
                        value="{{ $agenda->Fecha }}" style="font-size:25px;">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Hora:</strong>
                    <input placeholder="apellido" class="form-control" name="Hora" type="time" value="{{ $agenda->Hora }}"
                        style="font-size:25px;">
                </div>
            </div>

            <div class="col-xs-10 col-sm-12 col-md-10">
                <div class="form-group">
                    <h4>Disponibilidad</h4>
                    <select name="Disponibilidad" class="form-control" id="idr">
                        <option value="Disponible" {{ $agenda->Disponibilidad == 'Disponible' ? 'selected' : '' }}>
                            {{ $agenda->Disponibilidad == 'Disponible' ? $agenda->Disponibilidad : 'Disponible' }}</option>
                        <option value="No Disponible" {{ $agenda->Disponibilidad != 'Disponible' ? 'selected' : '' }}>
                            {{ $agenda->Disponibilidad != 'Disponible' ? $agenda->Disponibilidad : 'No Disponible' }}
                        </option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Actualizar Agenda</button>
            </div>

        </div>
    </form>
@endsection
