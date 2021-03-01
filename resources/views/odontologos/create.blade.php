@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Registro de Nuevo Odontologo</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('odontologos.index') }}"> Back</a>
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
    @if ($message = Session::get('error'))
    <div class="alert alert-error">
        <p>{{ $message }}</p>
    </div>
    @endif
    <form method="POST" action="{{ route('odontologos.store')}}" accept-charset="UTF-8">
        @csrf
        @method('POST')
    <div class="row">

        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Nombre:</strong>
                <input placeholder="Nombre" class="form-control" name="Nombre" type="text">
            </div>
        </div>
        <div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Apellido:</strong>
                <input placeholder="Apellido" class="form-control" name="Apellido" type="text">
            </div>
        </div>
        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Sexo:</strong>
                <select name="Sexo" class="form-control">
                    <option value="1">Masculino</option>
                    <option value="2">Femenino</option>
                </select>
            </div>
        </div>

        <div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Cedula de Identidad:</strong>
                <input type="number" name="CI" class="form-control" placeholder="ci..">
            </div>
        </div>

        <div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Direccion:</strong>
                <input placeholder="Direccion" class="form-control" name="Direccion" type="text">
            </div>
        </div>

                <div class="col-xs-12 col-sm-12 col-md-12">

                    <div id="mainForm"  name="mainForm" class="form-group">
                        <label>
                            odontologo
                            <input type="radio" id="odontologo" name="odontologo"   onclick="clickodontologo()"   value="odontologo"   class="flat-red">
                        </label>

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

  <div class="col-lg-10 col-xs-12 col-sm-6 col-md-6">
          <div class="alert alert-success">
        <h3>Lista de Especialidades</h3>
        <div class="form-group">
        <ul class="list-unstyled">
        @foreach($especialidades as $especialidad)
        <li>
          <label>
            <input name="especialidades[]" type="checkbox" value="{{$especialidad->id}}"> {{$especialidad->Nombre}}
          </label>
        </li>
        @endforeach
        </ul>
        </div>
      </div>
    </div>



        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <div class="form-group">
                <button onclick="myFunction()" type="submit" class="btn btn-danger">Aceptar</button>
            </div>
        </div>

    </div>
</div>



@endsection

@section('script')
    <script>

        $(document).ready(function(){
            formularioodontologo.style.display = 'none';


        });

        function  clickodontologo(){


            divNatural = document.getElementById('odontologo');
            if(divNatural.checked){

                formularioodontologo.style.display = '';

        }


    </script>

@endsection
