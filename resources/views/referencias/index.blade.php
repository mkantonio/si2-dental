@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Referencia Management</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('referencias.create') }}"> Crear Nueva Referencia</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Telefono</th>
            <th>Relacion</th>
            <th>Ci cliente</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($referencias as $key => $referencia)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $referencia->nombre }}</td>
                <td>{{ $referencia->apellido }}</td>
                <td>{{ $referencia->telefono }}</td>
                <td>{{ $referencia->relacion }}</td>
                <td>{{ $referencia->cliente }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('referencias.show',$referencia->id) }}">Mostrar</a>
                    <a class="btn btn-primary" href="{{ route('referencias.edit',$referencia->id) }}">Editar</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['referencias.destroy', $referencia->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>
    {!! $referencias->render() !!}
@endsection