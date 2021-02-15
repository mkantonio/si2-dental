@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>Privilegios</h1>
            </div>

            <div class="pull-right">
                <a class="btn btn-danger"style="min-width: 35px;height: 45px"  href="{{ route('permissions.create') }}"> <h4>Registrar Nuevo Permiso</h4> </a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>No</th>
            <th>Nombre</th>
            <th>Descripcion</th>

              <th width="200px">Action</th>
        </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        @foreach ($data as $key => $ocupacion)
            <tr>
                <td>{{ $ocupacion->id}}</td>
                <td>{{ $ocupacion->name}}</td>
                <td>{{ $ocupacion->display_name}}</td>

                <td>

                  <a class="btn btn-primary" style="min-width: 35px;height: 35px"href="{{ route('permissions.edit',$ocupacion->id) }}"><i class="fa fa-edit"></i>Edit</a>
                  {!! Form::open(['method' => 'DELETE','route' => ['permissions.destroy', $ocupacion->id],'style'=>'display:inline']) !!}
                  {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                  {!! Form::close() !!}

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
