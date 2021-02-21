@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Anamnesis del Paciente</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('anamnesis.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <form method="POST" action="{{route('anamnesis.update', $anamnesis->id)}}" accept-charset="UTF-8" enctype="multipart/form-data">
      @csrf
      @method('PATCH')
  <div class="row">
    <div class="col-xs-10 col-sm-12 col-md-12">
        <div class="form-group">
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
            <strong>Tratamiento Registrado:</strong>
            @foreach ($citas as $ac)
                <option value="{{$ac->id}}">
                    {{$ac->pregunta1}}</option>
            @endforeach
          </div>
        </div>
            <div class="form-group">
              <div class="alert-success">
                <strong>Esta en tratamiento Medico</strong>
               <textarea placeholder="Que Tratamiento es?" class="form-control" name="pregunta1" ></textarea>
            </div>
          </div>
          </div>


    <div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
          <div class="alert-">
            <strong>Alergias Regisrtrada</strong>
            @foreach ($citas as $ac)
                <option value="{{$ac->id}}">
                    {{$ac->pregunta2}}</option>
            @endforeach
          </div>
        </div>
        <div class="form-group">
          <div class="alert-success">
            <strong>Sufre de Alergias:</strong>
            <select name="pregunta2" class="form-control">
                <option value="antibioticos">Antibioticos</option>
                <option value="anastesicos">Anastesicos</option>
                <option  value="eugenol">Eugenol</option>
                <option value="mercurio">Mercurio</option>
                         <option value="mercurio">Otros</option>
            </select>
        </div>
      </div>
  </div>

  <div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
      <div class="form-group">
        <div class="alert-">
          <strong>Presion Arterial Registrada:</strong>
          @foreach ($citas as $ac)
              <option value="{{$ac->id}}">
                  {{$ac->pregunta3}}</option>
          @endforeach
        </div>
      </div>
      <div class="form-group">
        <div class="alert-success">
          <strong>Presion Arterial:</strong>
          <select name="pregunta3" class="form-control">
              <option value="alta">Alta</option>
              <option value="baja">Baja</option>
          </select>
      </div>
    </div>
</div>

<div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
    <div class="form-group">
      <div class="alert-">
        <strong>Fobia Registrado:</strong>
        @foreach ($citas as $ac)
            <option value="{{$ac->id}}">
                {{$ac->pregunta4}}</option>
        @endforeach
      </div>
    </div>

    <div class="form-group">
      <div class="alert-success">
        <strong>Fobias Del Paciente:</strong>
        <select name="pregunta4" class="form-control">
            <option value="Sangre">Fobia a la Sangre</option>
            <option value="Inyecciones">Inyecciones de Agujas</option>
            <option value="Animales">Animales</option>
            <option value="otros">Otros</option>
        </select>
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
                {{$ac->pregunta5}}</option>
        @endforeach
      </div>
    </div>
    <div class="form-group">
      <div class="alert-success">
        <strong>Frecuencia de Cepillado:</strong>
        <select name="pregunta5" class="form-control">
            <option value="una">Una vez al Dia</option>
            <option value="dos">Dos veces al Dia</option>
            <option  value="tres">Tres veces al Dia</option>
            <option value="nunca">Nunca</option>
        </select>
    </div>
  </div>
</div>

<div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
    <div class="form-group">
      <div class="alert-">
        <strong>Habitos de Consumo:</strong>
        @foreach ($citas as $ac)
            <option value="{{$ac->id}}">
                {{$ac->pregunta6}}</option>
        @endforeach
      </div>
    </div>
    <div class="form-group">
      <div class="alert-success">
        <strong>Usted:</strong>
        <select name="pregunta6" class="form-control">
            <option value="fuma">Fuma</option>
            <option value="bebe">Toma bebidas Alchoolicas</option>
            <option  value="ingiere">Consume algun tipo de Drogra</option>
            <option value="nunca">Ninguna</option>
        </select>
    </div>
   </div>
</div>


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
    <div class="form-group">
      <div class="alert-success">
        <strong>Estado:</strong>
        <select name="estado" class="form-control">
            <option value="bien">Saludable</option>
            <option value="mal">Enfermo</option>
            <option value="regular">Regular</option>
        </select>
    </div>
  </div>
</div>

<div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
    <div class="form-group">
      <div class="alert-">
        <strong>Descripcion Del Pacientes:</strong>
        @foreach ($citas as $ac)
            <option value="{{$ac->id}}">
                {{$ac->descripcion}}</option>
        @endforeach
      </div>
    </div>
    <div class="form-group">
      <div class="alert-success">
        <strong>Descripcion del Paciente:</strong>
        <textarea placeholder="Descripcion" class="form-control" name="descripcion" rows="4" cols="40" ></textarea>
    </div>
   </div>
</div>

<div class="col-lg-12 col-xs-12 col-sm-6 col-md-6">
    <div class="alert-danger">
    <h4>Enfermedades que Padece el Paciente</h4>
      <div class="form-group">
      <ul class="list-unstyled">
        @foreach($enfermedades as $value)
        <label>
            <input class="name" {{ in_array($value->id, $role1) ? "checked='checked'" : "" }} name="enfermedades[]" type="checkbox" value="{{$value->id}}">
              {{ $value->nombre}}
        </label>
        @endforeach
      </ul>
      </div>
    </div>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-12 text-center">
      <button type="submit" class="btn btn-primary">Submit</button>
  </div>

</div>



@endsection
