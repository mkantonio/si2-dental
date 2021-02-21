@extends('layouts.admin')
@section('content')
<center>
<h3>Nuevo Odontograma</h3>
<form method="POST" action="{{route('odontogramas.store')}}" accept-charset="UTF-8" enctype="multipart/form-data">
@csrf
@method('POST')
  <img src="{{asset('imagenes/odonto1.jpg')}}" alt="Odontograma" width="1000" height="200">
  <div class="col-lg-12 col-xs-12 col-sm-6 col-md-6" style="min-width:500px;height:150px" >
      <div class="alert alert-success">
          <h3><strong>-------------------</strong></h3>
        <div class="form-group">
        <ul class="list-unstyled">
        @foreach($dientes as $dental)
          <label>
            <input name="dientes[]" type="checkbox" value="{{$dental->id}}"> {{$dental->nombre}}
          </label>
        @endforeach
        </ul>
        </div>
      </div>
    </div>
    <img src="{{asset('imagenes/odonto2.jpg')}}" alt="Odontograma" width="1000" height="200">
<div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <div class="form-group">
        <button onclick="myFunction()" type="submit" class="btn btn-danger">Aceptar</button>
    </div>
</div>




@endsection
