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
    {!! Form::open(array('route' => 'odontologos.store','method'=>'POST')) !!}
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
                <strong>Cedula de Identidad:</strong>
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
                            odontologo
                            <input type="radio" id="odontologo" name="odontologo"   onclick="clickodontologo()"   value="odontologo"   class="flat-red">
                        </label>

                    </div>
                </div>


                <div id="formularioodontologo">
                    <div class="col-xs-12 col-sm-10 col-md-10">
                        <div class="form-group">
                            <strong>Email:</strong>
                            {!! Form::text('email', null, array('placeholder' => 'email','class' => 'form-control')) !!}
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
            {{ Form::checkbox('especialidades[]', $especialidad->id, null) }}     {{ $especialidad->nombre}}
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
    {!! Form::close() !!}


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
