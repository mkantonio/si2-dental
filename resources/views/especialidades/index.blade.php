@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Lista de Especialidades</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('especialidades.create') }}"> Registrar Especialidad</a>
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
                <th>Nombre</th>
                <th>Descripcion</th>


                <th width="280px">Action</th>
            </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        @foreach ($especialidades as $key => $especialidad)
            <tr>
                <td>{{ $especialidad->id }}</td>
                <td>{{ $especialidad->Nombre }}</td>
                <td>{{ $especialidad->Descripcion }}</td>

                <td>
                    <a class="btn btn-primary"  style="min-width: 35px;height: 35px"  href="{{ route('especialidades.show',$especialidad->id) }}"><i class="fa  fa-info"></i>Show</a>
                    <a class="btn btn-success" style="min-width: 35px;height: 35px"href="{{ route('especialidades.edit',$especialidad->id) }}"><i class="fa fa-edit"></i>Edit</a>
                    <form action="{{ route('especialidades.destroy', $especialidad->id) }}" method="POST" style='display:inline'>   
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
