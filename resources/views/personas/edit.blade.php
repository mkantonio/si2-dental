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

    <form method="POST" action="{{route('personas.update', $persona->id)}}" accept-charset="UTF-8" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Ci:</strong>
                <input placeholder="ci" class="form-control" name="ci" type="text">
            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre:</strong>
                <input placeholder="nombre" class="form-control" name="nombre" type="text">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Apellido:</strong>
                <input placeholder="apellido" class="form-control" name="apellido" type="text">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Telefono:</strong>
                <input placeholder="telefono" class="form-control" name="telefono" type="text">
            </div>
        </div>



        <div class="form-inline" id="groupSF">
            <div class="form-group" id="fechaCreate">
                <strong>Fecha de Nacimiento:</strong>
                <input name="fecha_nacimiento" type="date" value="{{ \Carbon\Carbon::now()->toDateString() }}">
            </div>
            <div class="form-group">
                <label for="sexo"><strong>Sexo</strong></label>
                <select class="form-control" name="sexo" id="sexo">
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                </select>
            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Direccion:</strong>
                <input placeholder="direccion" class="form-control" name="direccion" type="text">
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
                    <input placeholder="numero_hijos" class="form-control" name="numero_hijos" type="text">

                </div>
            @endif
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            @if($persona->tipo=='n')
                <div class="form-group">
                    <strong>Numero de Vehiculos:</strong>
                    <input placeholder="numero_vehiculos" class="form-control" name="numero_vehiculos" type="text">
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
                    <input placeholder="nit" class="form-control" name="nit" type="text">
                </div>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            @if($persona->tipo=='j')
                <div class="form-group">
                    <strong>Razon Social:</strong>
                    <input placeholder="razon_social" class="form-control" name="razon_social" type="text">
                </div>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            @if($persona->tipo=='j')
                <div class="form-group">
                    <strong>Fecha de constitucion:</strong>
                    <input name="fecha_constitucion" type="date" value="{{ \Carbon\Carbon::now()->toDateString() }}">
                </div>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            @if($persona->tipo=='j')
                <div class="form-group">
                    <strong>Nombre comercial:</strong>
                    <input placeholder="nombre_comercial" class="form-control" name="nombre_comercial" type="text">
                </div>
            @endif
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            @if($persona->tipo=='j')
                <div class="form-group">
                    <label for="Tipo_Empresa"><strong>Sexo</strong></label>
                    <select class="form-control" name="tipo_empresa" id="Tipo_Empresa">
                        <option value="S.A">S.A.</option>
                        <option value="S.R.L">S.R.L.</option>
                    </select>
                </div>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            @if($persona->tipo=='j')
                <div class="form-group">
                    <strong>Fecha de Vencimiento Poder:</strong>
                    <input name="vencimiento_poder" type="date" value="{{ \Carbon\Carbon::now()->toDateString() }}">
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


</form>


@endsection

