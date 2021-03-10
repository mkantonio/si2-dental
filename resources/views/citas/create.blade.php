@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3>Registar Nueva cita</h3>
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
    <div class="container">
        <form method="POST" action="{{ route('citas.store') }}" accept-charset="UTF-8">
            @csrf
            @method('POST')

            <div class="row">

                <div class="col-xs-10 col-sm-12 col-md-10">
                    <div class="form-group">
                        <h4>Recepcionista</h4>
                        <select name="recepcionista" class="form-control" id="idr">
                            @foreach ($recepcionistas as $r)
                                <option value="{{ $r->id }}">
                                    {{ $r->persona->Nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="col-xs-10 col-sm-12 col-md-10">
                    <div class="form-group">
                        <h4>Lista de Los Pacientes :</h4>
                        <select name="id" class="form-control" id="id">
                            @foreach ($personas as $ac)
                                <option value="{{ $ac->id }}">
                                    {{ $ac->Nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-xs-10 col-sm-12 col-md-10">
                    <div class="form-group">
                        <h4>Agenda del Odontologo</h4>
                        <select name="agenda_id" class="form-control" id="idr">
                            @foreach ($agenda as $a)
                                <option value="{{ $a->id }}">
                                    {{ $a->odontologo->persona->Nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-10">
                    <div class="form-group" id="fechaCreate">
                        <strong>Motivo de la visita:</strong>
                        <input placeholder="Descripcion" class="form-control" name="descripcion" type="text">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group" id="fechaCreate">
                        <strong>Hora de La Cita:</strong>
                        <input name="hora" type="time" value="{{ \Carbon\Carbon::now()->toTimeString() }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group" id="fechaCreate">
                        <strong>Fecha de La Cita:</strong>
                        <input name="fecha" type="date" value="{{ \Carbon\Carbon::now()->toDateString() }}">
                    </div>
                </div>


                <div class="col-xs-12 col-sm-12 col-md-12 ">
                    <div class="form-group">
                        <button onclick="myFunction()" type="submit" style="min-width: 60px;height: 60px"
                            class="btn btn-success">Aceptar</button>
                    </div>
                </div>

            </div>
    </div>



@endsection
