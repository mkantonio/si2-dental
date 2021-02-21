@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
          <h1 style="text-align:center;">Lista de Odontogramas</h1>
            <div class="pull-right">
                <a class="btn btn-primary"style="min-width: 40px;height: 40px"
                href="{{ route('odontogramas.create') }}"><h4>Nuevo Odontograma</h4> </a>
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

                <th width="280px">Action</th>
            </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        @foreach ($citas as $key => $cita)
            <tr>
                <td>{{$cita->id}}</td>
                <td>{{$cita->ci}}</td>
                <td>{{ $cita->nombreP }}</td>
                <td>{{ $cita->apell }}</td>

                <td>
                    <a class="btn btn-success" style="min-width: 35px;height: 35px"href="
                    {{ route('odontogramas.edit',$cita->id) }}"><i class="fa fa-edit"></i>Editar</a>
                    <form action="{{ route('odontogramas.destroy', $cita->id) }}" method="POST" style='display:inline'>   
                        @csrf
                        @method('DELETE')      
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>


    </table>
@endsection