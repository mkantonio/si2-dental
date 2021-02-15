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
    {!! Form::open(array('route' => 'citas.store','method'=>'POST')) !!}

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

      <div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
              <strong>Agenda Del Odontologo:</strong>
              {!! Form::text('agenda_id', null, array('placeholder' => 'Agenda del Odontologo','class' => 'form-control')) !!}
          </div>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-10">
           <div class="form-group" id="fechaCreate">
               <strong>Motivo de la visita:</strong>
                  {!! Form::text('descripcion', null, array('placeholder' => 'Descripcion','class' => 'form-control')) !!}
           </div>
       </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
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


        <div class="col-xs-12 col-sm-12 col-md-12 ">
            <div class="form-group">
                <button onclick="myFunction()" type="submit" style="min-width: 60px;height: 60px" class="btn btn-success">Aceptar</button>
            </div>
        </div>

    </div>
</div>
    {!! Form::close() !!}


@endsection
