@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create New Referencia</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('referencias.index') }}"> Back</a>
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
    {!! Form::open(array('route' => 'referencias.store','method'=>'POST')) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre:</strong>
                {!! Form::text('nombre', null, array('placeholder' => 'Nombre','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Apellido:</strong>
                {!! Form::text('apellido', null, array('placeholder' => 'Apellido','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Telefono:</strong>
                {!! Form::text('telefono', null, array('placeholder' => 'Telefono','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Relacion:</strong>
                {!! Form::text('relacion', null, array('placeholder' => 'Relacion','class' => 'form-control')) !!}
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
         <strong>Ci cliente:</strong>
                <select name="cliente" >
                    @foreach($persona as $v)
                        <option value="{{$v->id}}"> {{$v->ci}} </option>
                    @endforeach
                </select>
            </div>
       </div>
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Aceptar</button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection