@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>Editar datos del empleado</h1>
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
    <form method="POST" action="{{route('users.update', $user->id)}}" accept-charset="UTF-8" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input placeholder="name" class="form-control" name="name" type="text" value="{{$user->name}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input placeholder="email" class="form-control" name="email" type="text" value="{{$user->email}}">
            </div>
        </div>
{{--        <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--            <div class="form-group">--}}
{{--                <strong>Password:</strong>--}}
{{--                <input placeholder="password" class="form-control" name="password" type="text" value="{{$user->password}}">--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--            <div class="form-group">--}}
{{--                <strong>Confirm Password:</strong>--}}
{{--                <input placeholder="confirm password" class="form-control" name="confirm-password" type="text" value="{{$user->password}}">--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Rol:</strong>
{{--                {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control')) !!}--}}
                <select class="form-control" name="roles" id="sexo">
                    @foreach($roles as $rol)
                        <option value="{{$rol->name}}" {{($user->getRoleNames()[0]==$rol->name) ? 'selected="selected"' : ''}}>
                            {{$rol->name}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>



        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    </form>
@endsection
