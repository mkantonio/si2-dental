@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Lista de Enfermedades</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('padecimientos.create') }}"> Registrar Enfermedad</a>
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
        @foreach ($padecimientos as $key => $padecimiento)
            <tr>
                <td>{{ $padecimiento->id }}</td>
                <td>{{ $padecimiento->nombre }}</td>
                <td>{{ $padecimiento->descripcion }}</td>

                <td>
                    <a class="btn btn-primary"  style="min-width: 35px;height: 35px"  href="{{ route('padecimientos.show',$padecimiento->id) }}"><i class="fa  fa-info"></i>Show</a>
                    <a class="btn btn-success" style="min-width: 35px;height: 35px"href="{{ route('padecimientos.edit',$padecimiento->id) }}"><i class="fa fa-edit"></i>Edit</a>
                    <form action="{{ route('padecimientos.destroy', $padecimiento->id) }}" method="POST" style='display:inline'>   
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
