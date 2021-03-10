@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Reprograma Cita:</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('citas.index') }}"> Back</a>
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
    <form method="POST" action="{{ route('citas.update', $cita->id) }}" accept-charset="UTF-8"
        enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-xs-10 col-sm-12 col-md-10">
                <div class="form-group">
                    <h4>Lista de Los Pacientes :</h4>
                    <select name="IdPaciente" class="form-control" id="id">
                        @foreach ($personas as $ac)
                            <option value="{{ $ac->id }}">
                                {{ $ac->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-10">
                <div class="form-group" id="fechaCreate">
                    <strong>Motivo de la visita:</strong>
                    <textarea placeholder="Descripcion" class="form-control"
                        name="descripcion">{{ $cita->Descripcion }}</textarea>
                </div>
            </div>
            <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
                <div class="form-group" id="fechaCreate">
                    <strong>Hora de La Cita:</strong>
                    <input name="hora" type="time" value="{{ $cita->Hora }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group" id="fechaCreate">
                    <strong>Fecha de La Cita:</strong>
                    <input name="fecha" type="date" value="{{ $cita->Fecha }}">
                </div>
            </div>
            <div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Agenda Del Odontologo:</strong>
                    <select name="agenda_id" class="form-control" id="idr">
                        @foreach ($agendas as $a)
                            <option value="{{ $a->id }}">
                                {{ $a->odontologo->persona->Nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Aceptar</button>
            </div>
        </div>

    </form>



@endsection
