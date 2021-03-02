@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Lista de Recepcionistas</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('recepcionistas.create') }}"> Registrar Recepcionista</a>
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
                <th>CI</th>
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
        @foreach ($personas as $persona)
            <tr>
                <td>{{ $persona->id }}</td>
                <td>{{ $persona->persona->CI }}</td>
                <td>{{ $persona->persona->Nombre }}</td>
                <td>{{ $persona->persona->Apellido }}</td>
                <td>{{ $persona->persona->Sexo }}</td>
                <td>{{ $persona->persona->Direccion }}</td>
                <td>{{ $persona->persona->TipoP }}</td>


                <td>
                    <a class="btn btn-primary"  style="min-width: 35px;height: 35px"  href="{{ route('recepcionistas.show',$persona->id) }}"><i class="fa  fa-info"></i>Show</a>
                    <a class="btn btn-success" style="min-width: 35px;height: 35px"href="{{ route('recepcionistas.edit',$persona->id) }}"><i class="fa fa-edit"></i>Edit</a>
                    <form action="{{ route('recepcionistas.destroy', $persona->id) }}" method="POST" style='display:inline'>   
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
