@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Lista de Pacientes</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('pacientes.create') }}"> Registrar Paciente</a>
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
                <th>Id</th>
                <th>Ci</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Sexo</th>
                <th>Direccion</th>
                <th>Tipo</th>

                <th width="280px">Action</th>
            </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        @foreach ($personas as $key => $persona)
            <tr>
                <td>{{ $persona->id }}</td>
                <td>{{ $persona->CI }}</td>
                <td>{{ $persona->Nombre }}</td>
                <td>{{ $persona->Apellido }}</td>
                <td>{{ $persona->Sexo }}</td>
                <td>{{ $persona->Direccion }}</td>
                <td>{{ $persona->TipoP }}</td>



                <td>
                    <a class="btn btn-primary"  style="min-width: 35px;height: 35px"  href="{{ route('pacientes.show',$persona->id) }}"><i class="fa  fa-info"></i>Show</a>
                    <a class="btn btn-success" style="min-width: 35px;height: 35px"href="{{ route('pacientes.edit',$persona->id) }}"><i class="fa fa-edit"></i>Edit</a>
                    <form action="{{ route('pacientes.destroy', $persona->id) }}" method="POST" style='display:inline'>   
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
