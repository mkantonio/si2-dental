@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Informacion Detallada de la Cita:</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('citas.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <div class="row">


      <div class="col-xs-10 col-sm-12 col-md-10">
          <div class="form-group">
              <h4>Nombre del Paciente :</h4>
              <select name="id" class="form-control" id="id">
                  @foreach ($personas as $ac)
                      <option value="{{$ac->id}}">
                          {{$ac->Nombre}}</option>
                  @endforeach
              </select>
          </div>
      </div>

      <div class="col-xs-10 col-sm-12 col-md-10">
          <div class="form-group">
              <h4>apellido del Paciente :</h4>
              <select name="id" class="form-control" id="id">
                  @foreach ($personas as $ac)
                      <option value="{{$ac->id}}">
                          {{$ac->Apellido}}</option>
                  @endforeach
              </select>
          </div>
      </div>



        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <div class="alert alert-info">
                <strong><h4>Hora de la Cita:</h4></strong>
               <h4>  {{ $cita->Hora}}</h4>
            </div>
        </div>
      </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <div class="alert alert-info">
                <strong>Fecha de la Cita:</strong>
                <h4>{{ $cita->Fecha}}</h4>
            </div>
        </div>
      </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <div class="alert alert-info">
                <strong>Motivo de la visita del Paciente:</strong>
                <h4>{{ $cita->Descripcion }}</h4>
            </div>
        </div>
    </div>
  </div>

@endsection
