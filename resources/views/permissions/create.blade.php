@extends('layouts.admin')

@section('content')
  <div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3>Registar Nuevo Permiso</h3>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('permissions.index') }}"> Back</a>
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
    <form method="POST" action="{{ route('permissions.store')}}" accept-charset="UTF-8">
        @csrf
        @method('POST')
    <div class="row">


      <div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
              <strong>Nombre del Permiso:</strong>
              <input placeholder="name" class="form-control" name="nombre" type="text">
          </div>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-10">
           <div class="form-group" id="fechaCreate">
               <strong>Descripcion:</strong>
               <textarea placeholder="Descripcion" class="form-control" name="display_name" rows="4" cols="40" ></textarea>
           </div>
       </div>

        <div class="col-xs-12 col-sm-12 col-md-12 ">
            <div class="form-group">
                <button onclick="myFunction()" type="submit" style="min-width: 60px;height: 60px" class="btn btn-success">Aceptar</button>
            </div>
        </div>

    </div>

    </form>
</div>

@endsection
