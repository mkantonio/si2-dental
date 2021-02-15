@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar Datos de la Persona</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('personas.index') }}"> Back</a>
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

    {!! Form::model($persona, ['method' => 'PATCH','route' => ['personas.update', $persona->id],'files'=>'true']) !!}
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
                {!! Form::text('nombre', null, array('placeholder' => 'nombre','class' => 'form-control')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Apellido:</strong>
                {!! Form::text('apellido', null, array('placeholder' => 'apellido','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Telefono:</strong>
                {!! Form::text('telefono', null, array('placeholder' => 'telefono','class' => 'form-control')) !!}
            </div>
        </div>



        <div class="form-inline" id="groupSF">
            <div class="form-group" id="fechaCreate">
                <strong>Fecha de Nacimiento:</strong>
                {!! Form::date('fecha_nacimiento' , \Carbon\Carbon::now())!!}
            </div>
            <div class="form-group">
                {!! Form::label('Sexo: ') !!}
                {!! Form::select('sexo', ['M' => 'Masculino', 'F' => 'Femenino'], null, ['placeholder' => 'sexo']) !!}
            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Direccion:</strong>
                {!! Form::text('direccion', null, array('placeholder' => 'direccion','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Firma:</strong>
                <input type="file" name="firma" class="form-control" >
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Foto:</strong>
                <input type="file" name="foto" class="form-control" >
            </div>
        </div>
        <div id="mainForm"  name="mainForm" class="form-group">
            @if($persona->tipo=='n')
                <label>
                    natural
                    <input type="radio" name="natural" id="natural" checked="checked" value="natural"  class="flat-red" >
                </label>
                <label>
                    juridico
                    <input type="radio" id="juridico" name="juridico"   disabled="disabled"  value="juridico"   class="flat-red"  >

                </label>
            @endif
            @if($persona->tipo=='j')
                <label>
                    natural
                    <input type="radio" name="natural" id="natural"  value="natural" disabled="disabled" class="flat-red" >
                </label>
                <label>
                    juridico
                    <input type="radio" id="juridico" name="juridico"   checked="checked"   value="juridico"   class="flat-red"  >

                </label>
            @endif
        </div>




        <div class="col-xs-12 col-sm-12 col-md-12">
            @if($persona->tipo=='n')
                <div class="form-group">
                    <strong>Numero de hijos:</strong>
                    {!! Form::text('numero_hijos', null, array('placeholder' => 'numero_hijos','class' => 'form-control')) !!}

                </div>
            @endif
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            @if($persona->tipo=='n')
                <div class="form-group">
                    <strong>Numero de Vehiculos:</strong>
                    {!! Form::text('numero_vehiculos', null, array('placeholder' => 'numero_vehiculos','class' => 'form-control')) !!}
                </div>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            @if($persona->tipo=='n')
                <select name="ocupacion" id="">
                    @foreach($ocupaciones as $key => $ocupacion)
                        <option name="natural" value="{{$ocupacion->id}}"> {{$ocupacion->descripcion}} </option>
                    @endforeach
                </select>
            @endif
        </div>




        <div class="col-xs-12 col-sm-12 col-md-12">
            @if($persona->tipo=='j')
                <div class="form-group">
                    <strong>NIT:</strong>
                    {!! Form::text('nit', null, array('placeholder' => 'nit','class' => 'form-control')) !!}
                </div>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            @if($persona->tipo=='j')
                <div class="form-group">
                    <strong>Razon Social:</strong>
                    {!! Form::text('razon_social', null, array('placeholder' => 'razon_social','class' => 'form-control')) !!}
                </div>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            @if($persona->tipo=='j')
                <div class="form-group">
                    <strong>Fecha de constitucion:</strong>
                    {!! Form::date('fecha_constitucion', \Carbon\Carbon::now()) !!}
                </div>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            @if($persona->tipo=='j')
                <div class="form-group">
                    <strong>Nombre comercial:</strong>
                    {!! Form::text('nombre_comercial', null, array('placeholder' => 'nombre_comercial','class' => 'form-control')) !!}
                </div>
            @endif
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            @if($persona->tipo=='j')
                <div class="form-group">
                    {!! Form::label('Tipo Empresa: ') !!}
                    {!! Form::select('tipo_empresa', ['S.A.' => 'S.A.', 'S.R.L.' => 'S.R.L'], null, ['placeholder' => 'tipo_empresa']) !!}
                </div>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            @if($persona->tipo=='j')
                <div class="form-group">
                    <strong>Fecha de Vencimiento Poder:</strong>
                    {!! Form::date('vencimiento_poder', \Carbon\Carbon::now()) !!}
                </div>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            @if($persona->tipo=='j')
                <strong>Rubros : </strong>
            <select name="rubro" id="">
                @foreach($rubros as $key => $rubro)
                    <option value="{{$rubro->id}}"> {{$rubro->descripcion}} </option>
                @endforeach
            </select>
                @endif
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Aceptar</button>
        </div>
    </div>


    {!! Form::close() !!}


@endsection

