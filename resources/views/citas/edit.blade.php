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
    {!! Form::model($cita, ['method' => 'PATCH','route' => ['citas.update', $cita->id],'files'=>'true']) !!}
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
                {!! Form::text('descripcion', null, array('placeholder' => 'Descripcion','class' => 'form-control')) !!}
         </div>
     </div>
        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group" id="fechaCreate">
                <strong>Hora de La Cita:</strong>
                {!! Form::time('hora', \Carbon\Carbon::now()) !!}
            </div>
        </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group" id="fechaCreate">
              <strong>Fecha de La Cita:</strong>
              {!! Form::date('fecha', \Carbon\Carbon::now()) !!}
          </div>
      </div>
      <div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
              <strong>Agenda Del Odontologo:</strong>
              {!! Form::text('agenda_id', null, array('placeholder' => 'Agenda del Odontologo','class' => 'form-control')) !!}
          </div>
      </div>


        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Aceptar</button>
        </div>
      </div>

        {!! Form::close() !!}



@endsection
