@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create Nueva Persona</h2>
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
    <form method="POST" action="{{ route('personas.store')}}" accept-charset="UTF-8">
        @csrf
        @method('POST')
    <div class="row">

        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Nombre:</strong>
                <input placeholder="Nombre" class="form-control" name="nombre" type="text">
            </div>
        </div>
        <div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Apellido:</strong>
                <input placeholder="apellido" class="form-control" name="apellido" type="text">
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
                <input placeholder="Direccion" class="form-control" name="direccion" type="text">
            </div>
        </div>



        <div class="col-xs-12 col-sm-12 col-md-12">

            <div id="mainForm"  name="mainForm" class="form-group">
                <label>
                    odontologo
                    <input type="radio" id="odontologo" name="odontologo"   onclick="clickodontologo()"   value="odontologo"   class="flat-red">
                </label>
                <label>
                    recepcionista
                    <input type="radio" id="recepcionista" name="recepcionista"   onclick="clickrecepcionista()"   value="recepcionista"   class="flat-red">
                </label>
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
                    <input name="fecha" type="date" value="{{ \Carbon\Carbon::now()->toDateString() }}">
                </div>
            </div>
        </div>



        <div id="formularioodontologo">
            <div class="col-xs-12 col-sm-10 col-md-10">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input placeholder="email" class="form-control" name="email" type="text">
                </div>
            </div>
        </div>

        <div id="formulariorecepcionista">
            <div class="col-xs-12 col-sm-10 col-md-10">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input placeholder="email" class="form-control" name="email2" type="text">
                </div>
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <div class="form-group">
                <button onclick="myFunction()" type="submit" class="btn btn-primary">Aceptar</button>
            </div>
        </div>

    </div>

    </form>


@endsection

@section('script')
    <script>

        $(document).ready(function(){
            formularioodontologo.style.display = 'none';
            formulariopaciente.style.display = 'none';
            formulariorecepcionista.style.display = 'none';

        });

        function  clickodontologo(){
            document.getElementById("recepcionista").checked = false;
            document.getElementById("paciente").checked = false;

            divNatural = document.getElementById('odontologo');
            if(divNatural.checked){

                formularioodontologo.style.display = '';
                formulariorecepcionista.style.display = 'none';
                formulariopaciente.style.display = 'none';
            }
        }

        function  clickrecepcionista(){
            document.getElementById("odontologo").checked = false;
            document.getElementById("paciente").checked = false;

            divNatural = document.getElementById('recepcionista');
            if(divNatural.checked){

                formularioodontologo.style.display = 'none';
                formulariorecepcionista.style.display = '';
                formulariopaciente.style.display = 'none';
            }
        }

        function  clickpaciente(){
            document.getElementById("recepcionista").checked = false;
            document.getElementById("odontologo").checked = false;

            divNatural = document.getElementById('paciente');
            if(divNatural.checked){

                formularioodontologo.style.display = 'none';
                formulariorecepcionista.style.display = 'none';
                formulariopaciente.style.display = '';
            }
        }
    </script>

@endsection
