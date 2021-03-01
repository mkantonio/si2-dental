@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Bitacora</h2>
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
        <th>Id</th>
        <th>Usuario</th>
        <th>Accion</th>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Email</th>
        <th>IP</th>
        <th>URL</th>

        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        @foreach ($bitacoras as $key => $bitacora)
            <tr>
                <td>{{ $bitacora->id}}</td>
                <td>{{ $bitacora->user}}</td>
                <td>{{ $bitacora->accion}}</td>
                <td>{{ $bitacora->fecha}}</td>
                <td>{{ $bitacora->hora}}</td>
                <td>{{ $bitacora->email}}</td>
                <td>{{ $bitacora->ip}}</td>
                <td>{{ $bitacora->url}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection