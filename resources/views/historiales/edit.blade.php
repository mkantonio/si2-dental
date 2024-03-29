@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Historial del Paciente</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('historiales.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <form method="POST" action="{{route('historiales.update', $historial->id)}}" accept-charset="UTF-8" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
  <div class="row">
    <div class="col-xs-10 col-sm-12 col-md-12">
        <div class="form-group">
            <h4><strong>Historial de:</strong></h4>
              <strong>Nombre:</strong>
                @foreach ($citas as $ac)
                  {{$ac->nombreP}}
                  {{$ac->apell}}
                @endforeach
             <strong>......</strong>
                 <strong>Cedula de Identidad:</strong>
                @foreach ($citas as $ac)
                  {{$ac->ci}}
                @endforeach
                <strong>.....</strong>
                <strong>Direccion:</strong>
               @foreach ($citas as $ac)
                 {{$ac->dir}}
               @endforeach
               <strong>.....</strong>
               <strong>Genero:</strong>
              @foreach ($citas as $ac)
                {{$ac->sex}}
              @endforeach
              <strong>.....</strong>
              <strong>Codigo de Historial:</strong>
             @foreach ($citas as $ac)
               {{$ac->id}}
             @endforeach
        </div>
    </div>
    <br>

    <h4><strong>Antecedentes Generales</strong></h4>

    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
          <div class="alert-primary">
            <strong>Esta en tratamiento Con su Medico:</strong>
            @foreach ($citas as $ac)
                <option value="{{$ac->id}}">
                    {{$ac->Pregunta1}}</option>
            @endforeach
          </div>
        </div>

          </div>


    <div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
          <div class="alert-">
            <strong>Alergias Regisrtrada</strong>
            @foreach ($citas as $ac)
                <option value="{{$ac->id}}">
                    {{$ac->Pregunta2}}</option>
            @endforeach
          </div>
        </div>
  </div>

  <div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
      <div class="form-group">
        <div class="alert-">
          <strong>Presion Arterial Registrada:</strong>
          @foreach ($citas as $ac)
              <option value="{{$ac->id}}">
                  {{$ac->Pregunta3}}</option>
          @endforeach
        </div>
      </div>

</div>

<div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
    <div class="form-group">
      <div class="alert-">
        <strong>Fobia Registrado:</strong>
        @foreach ($citas as $ac)
            <option value="{{$ac->id}}">
                {{$ac->Pregunta4}}</option>
        @endforeach
      </div>
    </div>

</div>

<h4><strong>Habitos de Vida</strong></h4>
<div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
    <div class="form-group">
      <div class="alert-">
        <strong>Frecuencia de Cepillado Registrada:</strong>
        @foreach ($citas as $ac)
            <option value="{{$ac->id}}">
                {{$ac->Pregunta5}}</option>
        @endforeach
      </div>
    </div>

</div>

{{-- <div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
    <div class="form-group">
      <div class="alert-">
        <strong>Habitos de Consumo:</strong>
        @foreach ($citas as $ac)
            <option value="{{$ac->id}}">
                {{$ac->pregunta6}}</option>
        @endforeach
      </div>
    </div>
</div> --}}


<div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
    <div class="form-group">
      <div class="alert-">
        <strong>Estado Actual del Paciente:</strong>
        @foreach ($citas as $ac)
            <option value="{{$ac->id}}">
                {{$ac->es}}</option>
        @endforeach
      </div>
    </div>

</div>

<div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
    <div class="form-group">
      <div class="alert-">
        <strong>Descripcion Del Pacientes:</strong>
        @foreach ($citas as $ac)
            <option value="{{$ac->id}}">
                {{$ac->Descripcion}}</option>
        @endforeach
      </div>
    </div>

</div>

<div class="col-lg-12 col-xs-12 col-sm-6 col-md-6">
    <div class="alert-danger">
    <h4>Lista de Enfermedades</h4>
      <div class="form-group">
      <ul class="list-unstyled">
        @foreach($enfermedades as $value)
            <label>
                <input class="name" {{ in_array($value->id, $role1) ? "checked='checked'" : "" }} name="enfermedades[]" type="checkbox" value="{{$value->id}}">
                {{ $value->Nombre}}
              </label>
        @endforeach
      </ul>
      </div>
    </div>
  </div>

</div>
        </form>



@endsection
