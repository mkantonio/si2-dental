@extends('layouts.admin')
@section('content')
<center>
<h3>Nuevo Odontograma</h3>
<div class="row">
  <div class="col-lg-12 margin-tb">
      <div class="pull-left">
          <h3>Registar Nueva cita</h3>
      </div>
      <div class="pull-right">
          <a class="btn btn-primary" href="{{ route('odontogramas.index') }}">Atrás</a>
      </div>
  </div>
</div>
<form method="POST" action="{{route('odontogramas.store')}}" accept-charset="UTF-8" enctype="multipart/form-data">
@csrf
@method('POST')
<div class="col-xs-10 col-sm-12 col-md-10">
  <div class="form-group">
      <h4><strong>Lista de Los Pacientes:</strong></h4>
      <select name="IdPaciente" class="form-control" id="id">
          @foreach ($pacientes as $paciente)
              <option value="{{ $paciente->id }}">
                  {{ $paciente->persona->Nombre }}</option>
          @endforeach
      </select>
  </div>
</div>


<div class="col-xs-12 col-sm-12 col-md-10">
  <div class="form-group" id="fechaCreate">
      <strong>Descripcion del odontograma:</strong>
          <textarea placeholder="Descripcion" class="form-control" name="descripcion" ></textarea>
  </div>
</div>

  <img src="{{asset('imagenes/odonto1.jpg')}}" alt="Odontograma" width="1000" height="200">
  <div class="col-lg-12 col-xs-12 col-sm-6 col-md-6" style="min-width:500px;height:150px" >
      <div class="alert alert-success">
          <h3><strong>-------------------</strong></h3>
        <div class="form-group">
        <ul class="list-unstyled">
        @foreach($dientes as $dental)
          <label>
            <input name="dientes[]" type="checkbox" value="{{$dental->id}}"> {{$dental->Nombre}}
          </label>
        @endforeach
        </ul>
        </div>
      </div>
    </div>
    <img src="{{asset('imagenes/odonto2.jpg')}}" alt="Odontograma" width="1000" height="200">
<div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <div class="form-group">
        <button onclick="myFunction()" type="submit" class="btn btn-danger">Crear Odontograma</button>
    </div>
</div>




@endsection
