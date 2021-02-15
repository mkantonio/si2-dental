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
    {!! Form::open(array('route' => 'permissions.store','method'=>'POST')) !!}

    <div class="row">


      <div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
              <strong>Nombre del Permiso:</strong>
              {!! Form::text('name', null, array('placeholder' => '','class' => 'form-control')) !!}
          </div>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-10">
           <div class="form-group" id="fechaCreate">
               <strong>Descripcion:</strong>
                  {!! Form::textarea('display_name', null, array('placeholder' => 'Descripcion','class' => 'form-control')) !!}
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
</div>

@endsection
