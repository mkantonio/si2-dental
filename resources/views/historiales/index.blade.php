@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <h1 style="text-align:center;">Lista de Historiales</h1>
            <div class="pull-right">
                <a class="btn btn-primary" style="min-width: 40px;height: 40px" href="{{ route('historiales.create') }}">
                    <h4>Crear Historial</h4>
                </a>
            </div>

        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <br>
    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Cedula de Identidad</th>
                <th>Nombre del Paciente</th>
                <th>Apellido </th>
                <th>edad</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
            @foreach ($historiales as $historial)
                <tr>
                    <td>{{ $historial->id }}</td>
                    <td>{{ $historial->CI }}</td>
                    <td>{{ $historial->nombreP }}</td>
                    <td>{{ $historial->apell }}</td>
                    <td>{{ $historial->Fecha }}</td>
                    <td>
                        <a class="btn btn-info" style="min-width: 35px;height: 35px" href="
                        {{ route('historiales.edit', $historial->id) }}"><i class="fa fa-edit"></i>Detalles</a>
                        <a class="btn btn-warning" style="min-width: 35px;height: 35px" href="
                        {{ route('historiales.show', $historial->id) }}"><i class=""></i>Detalles Servicios</a>
                    </td>
                </tr>
            @endforeach
        </tbody>


    </table>
@endsection
