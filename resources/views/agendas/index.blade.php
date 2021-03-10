@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Lista de Agendas</h2>
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
                <th>Nombre del Paciente</th>
                <th>Apellido</th>
                <th>Hora de la Cita</th>
                <th>Fecha de la Cita</th>
                <th>motivo</th>

                <th width="280px">Action</th>
            </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        @foreach ($citas as $key => $cita)
            <tr>
                <td>{{ $cita->nombreP }}</td>
                <td>{{ $cita->apell }}</td>
                <td>{{ $cita->hora }}</td>
                <td>{{ $cita->fecha }}</td>
                <td>{{ $cita->descripcion }}</td>
                <td>
<a class="btn btn-info"  style="min-width: 35px;height: 35px"  href="{{ route('citas.show',$cita->id) }}"><i class="fa  fa-info"></i>Detalle De Cita</a>
                    <a class="btn btn-success" style="min-width: 35px;height: 35px"href="
                    {{ route('citas.edit',$cita->id) }}"><i class="fa fa-edit"></i>Reprogramar Cita</a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
