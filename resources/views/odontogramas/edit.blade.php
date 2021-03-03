@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>Editar Odontograma</h1>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('odontogramas.index') }}"> Back</a>
            </div>
        </div>
    </div>
<center>
    <form method="POST" action="{{route('odontogramas.update', $odontograma->id)}}" accept-charset="UTF-8" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
<div class="center">
    <img src="{{asset('imagenes/odonto1.jpg')}}" alt="Odontograma" width="1000" height="200">
    <div class="col-lg-12 col-xs-12 col-sm-6 col-md-6" style="min-width:500px;height:150px" >
        <div class="alert alert-success">
            <h3><strong>Dientes</strong></h3>
          <div class="form-group">
          <ul class="list-unstyled">
                @foreach($diente as $value)
                    <label><input class="name" {{ in_array($value->id, $piezadental) ? "checked='checked'" : "", $value->id }} name="dientes[]" type="checkbox" value="{{$value->id}}">
                        {{ $value->Nombre}}</label>
                @endforeach
              </ul>
              </div>
            </div>
          </div>
          <img src="{{asset('imagenes/odonto2.jpg')}}" alt="Odontograma" width="1000" height="200">
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
</div>
    </form>
@endsection
