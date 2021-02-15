@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>Registrar nuevo usuario</h1>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
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
    {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label><h4>Odontologos </h4> </label>
                <select name="id" class="form-control" id="id">
                    @foreach ($odontologos as $ac)
                        <option value="{{$ac->nombre}}_{{$ac->email}}">
                            {{$ac->nombre}}_{{$ac->apellido}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label><h4>Recepcionistas</h4> </label>
                <select name="id" class="form-control" id="id1">
                    @foreach ($recepcionistas as $ac)
                        <option value="{{$ac->nombre}}_{{$ac->email}}">
                            {{$ac->nombre}}_{{$ac->apellido}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label><h4>Nombre</h4> </label>
                <input type="text" name="name" id="name"
                class="form-control" placeholder="...">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <label><h4>Email</h4> </label>
                <input type="text" name="email" id="email"
                       class="form-control" placeholder="...">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong><h4>Password</h4></strong>
                {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong><h4>Confirmar Contraseña</h4></strong>
                {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong><h4>Rol</h4></strong>
                {!! Form::select('roles[]', $roles,[], array('class' => 'form-control')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection

@section('script')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript">

        $("#id").change(mostrar);
        function mostrar() {
            datos = document.getElementById('id').value.split('_');
            $("#name").val(datos[0]);
            $("#email").val(datos[1]);
        }

        $("#id1").change(get);
        function get() {
            datos = document.getElementById('id1').value.split('_');
            $("#name").val(datos[0]);
            $("#email").val(datos[1]);
        }
    </script>


@endsection
