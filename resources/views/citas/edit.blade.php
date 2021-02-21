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
    <form method="POST" action="{{route('citas.update', $citas->id)}}" accept-charset="UTF-8" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
  <div class="row">
    <div class="col-xs-10 col-sm-12 col-md-10">
        <div class="form-group">
            <h4>Lista de Los Pacientes :</h4>
            <select name="id" class="form-control" id="id">
                @foreach ($personas as $ac)
                    <option value="{{$ac->id}}">
                        {{$ac->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-10">
         <div class="form-group" id="fechaCreate">
             <strong>Motivo de la visita:</strong>
                 <textarea placeholder="Descripcion" class="form-control" name="descripcion" ></textarea>
         </div>
     </div>
        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
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
      <div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
              <strong>Agenda Del Odontologo:</strong>
              <input placeholder="Agenda del Odontologo" class="form-control" name="agenda_id" type="text">
          </div>
      </div>


        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Aceptar</button>
        </div>
      </div>

    </form>



@endsection
