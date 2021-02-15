@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
          <h1 style="text-align:center;">Historial de Servicios del Paciente</h1>
          <div class="pull-right">
              <a class="btn btn-primary" href="{{ route('historiales.index') }}"> Back</a>
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
                <th>Nombre del odontologo</th>
                <th>tratamiento Realizado</th>
                <th>Numero de cita</th>

            </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        @foreach ($citas as $key => $cita)
            <tr>
                <td>{{ $cita->name }}</td>
                <td>{{ $cita->name1 }}</td>
                <td>{{ $cita->id_cita }}</td>

            </tr>
        @endforeach
        </tbody>


    </table>
@endsection
