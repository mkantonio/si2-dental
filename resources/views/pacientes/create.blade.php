@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Registrar Nuevo Paciente</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('pacientes.index') }}"> Back</a>
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
    {!! Form::open(array('route' => 'pacientes.store','method'=>'POST')) !!}
    <div class="row">

        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Nombre:</strong>
                {!! Form::text('nombre', null, array('placeholder' => 'Nombre','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Apellido:</strong>
                {!! Form::text('apellido', null, array('placeholder' => 'Apellido','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Sexo:</strong>
                <select name="sexo" class="form-control">
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                </select>
            </div>
        </div>

        <div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>CI:</strong>
                <input type="text" name="ci" class="form-control" placeholder="ci..">
            </div>
        </div>

        <div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Direccion:</strong>
                {!! Form::text('direccion', null, array('placeholder' => 'Direccion','class' => 'form-control')) !!}
            </div>
        </div>



        <div class="col-xs-12 col-sm-12 col-md-12">

            <div id="mainForm"  name="mainForm" class="form-group">
                <label>
                    paciente
                    <input type="radio" id="paciente" name="paciente"   onclick="clickpaciente()"   value="paciente"   class="flat-red">
                </label>
            </div>
        </div>
        <div id="formulariopaciente">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group" id="fechaCreate">
                    <strong>Fecha de Nacimiento:</strong>
                    {!! Form::date('fecha', \Carbon\Carbon::now()) !!}
                </div>
            </div>
        </div>



        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <div class="form-group">
                <button onclick="myFunction()" type="submit" class="btn btn-primary">Aceptar</button>
            </div>
        </div>

    </div>

    {!! Form::close() !!}


@endsection

@section('script')
    <script>

        $(document).ready(function(){
          
            formulariopaciente.style.display = 'none';
          

        });

        

        function  clickpaciente(){
            

            divNatural = document.getElementById('paciente');
            if(divNatural.checked){

            
                formulariopaciente.style.display = '';
            }
        }
    </script>

@endsection
