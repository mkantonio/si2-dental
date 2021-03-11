@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Lista de Agendas de Odontologos</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('agendas.create') }}"> Registrar Agenda de Odontolgo</a>
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
                <th>ID</th>
                <th>Odontologo</th>
                <th>Hora</th>
                <th>Fecha</th>
                <th>Disponibilidad</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
            @foreach ($agendas as $key => $agenda)
                <tr>
                    <td>{{ $agenda->id }}</td>
                    <td>{{ $agenda->odontologo->persona->Nombre }}</td>
                    <td>{{ $agenda->Hora }}</td>
                    <td>{{ $agenda->Fecha }}</td>
                    <td>{{ $agenda->Disponibilidad }}</td>
                    <td>
                        <a class="btn btn-info" style="min-width: 35px;height: 35px" href="{{ route('agendas.show', $agenda->id) }}"><i class="fa  fa-info"></i>Detalle de agenda</a>
                        <a class="btn btn-success" style="min-width: 35px;height: 35px" href="{{ route('agendas.edit', $agenda->id) }}"><i class="fa fa-edit"></i>Editar Agenda</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
