@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Registro de Servicio </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('historiales.index') }}"> Back</a>
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
    <form method="POST" action="{{ route('servicios.store')}}" accept-charset="UTF-8">
        @csrf
        @method('POST')


      <div class="col-xs-10 col-sm-12 col-md-10">
          <div class="form-group">
            <div class="alert-success">
              <strong>Odontologo De servicio:</strong>
              <select name="id" class="form-control" id="id">
                  @foreach ($persona as $ac)
                      <option value="{{$ac->id}}">
                          {{$ac->nombre}}_{{$ac->apellido}}</option>
                  @endforeach
              </select>
          </div>
        </div>
      </div>
      <div class="col-xs-10 col-sm-12 col-md-10">
          <div class="form-group">
            <div class="alert-success">
              <strong>Tratamiento Realizado:</strong>
              <select name="id_trata" class="form-control" id="id">
                  @foreach ($tratamiento as $trata)
                      <option value="{{$ac->id}}">
                          {{$trata->nombre}}</option>
                  @endforeach
              </select>
          </div>
        </div>
      </div>

      <div class="col-xs-10 col-sm-12 col-md-10">
          <div class="form-group">
              <div class="alert-success">
              <strong>Cita Realizada por el Paciente:</strong>
              <select name="id_cita" class="form-control" id="id">
                  @foreach ($cita as $piv)
                      <option value="{{$ac->id}}">
                      Numero de Cita:-  {{$piv->id}}....Nombre del Paciente ....{{$piv->name}}...{{$piv->apell}}</option>
                  @endforeach
              </select>
          </div>
        </div>
      </div>

      <div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <div class="alert-success">
              <strong>Tipo de Servicio:</strong>
              <select name="pregunta2" class="form-control">
                  <option value="Tratamiento">Tratamiento</option>
                  <option value="Consulta_General">Consulta_General</option>
                  <option value="Otros">Otros</option>
              </select>
          </div>
        </div>
      </div>


        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <div class="form-group">
                <button onclick="myFunction()" type="submit" class="btn btn-danger">Aceptar</button>
            </div>
        </div>


    </form>


@endsection
