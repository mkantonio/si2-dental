@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Editar Informacion:</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('recepcionistas.index') }}"> Back</a>
            </div>
        </div>
    </div>
    {!! Form::model($persona, ['method' => 'PATCH','route' => ['recepcionistas.update', $persona->id],'files'=>'true']) !!}
    <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Ci:</strong>
                  {!! Form::text('ci', null, array('placeholder' => 'ci','class' => 'form-control')) !!}
              </div>
            </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre:</strong>
                      {!! Form::text('nombre', null, array('placeholder' => 'name','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Apellido:</strong>
                  {!! Form::text('apellido', null, array('placeholder' => 'name','class' => 'form-control')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Sexo:</strong>
          {!! Form::text('sexo', null, array('placeholder' => 'name','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Direccion:</strong>
              {!! Form::text('direccion', null, array('placeholder' => 'name','class' => 'form-control')) !!}
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Aceptar</button>
        </div>
      </div>

        {!! Form::close() !!}



@endsection
