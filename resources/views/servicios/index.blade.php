@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
          <h1 style="text-align:center;">Servicios Registrados</h1>
            <div class="pull-right">
                <a class="btn btn-danger"style="min-width: 40px;height: 40px"
                href="{{ route('servicios.create') }}"><h4>Registrar Servicios</h4> </a>
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
                <th>Numero de cita</th>
                <th>Odontologo </th>
                <th>Tratamiento</th>
                <th>Paciente Nombre</th>

              <th width="280px">Action</th>
            </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        @foreach ($servicios as $key => $servicio)
            <tr>
                <td>{{ $servicio->idcita}}</td>
                <td>{{ $servicio->name1}}_{{$servicio->apelli}}</td>
                <td>{{ $servicio->name }}</td>
                <td>
                    @foreach ($citas as $cita)
                        @if ( $cita->id == $servicio->idcita )
                            {{$cita->paciente->persona->Nombre}} {{$cita->paciente->persona->Apellido}}
                        @endif
                    @endforeach
                </td>

                <td>
                    <a class="btn btn-info" style="min-width: 35px;height: 35px"href="
                    {{ route('servicios.edit',$servicio->id) }}"><i class="fa fa-edit"></i>Detalles</a>
                
                </td>
            </tr>
        @endforeach
        </tbody>


    </table>
@endsection
