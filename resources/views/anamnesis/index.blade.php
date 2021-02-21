@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
          <h1 style="text-align:center;">Anamnesis de los Pacientes</h1>

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
        @foreach ($aux as $key => $piv)
            <tr>
                <td>{{ $piv->id_a }}</td>
                <td>{{ $piv->ci }}</td>
                <td>{{ $piv->nombreP }}</td>
                <td>{{ $piv->apell }}</td>
                <td>
                    <a class="btn btn-info" style="min-width: 35px;height: 35px"href="
                    {{ route('anamnesis.edit',$piv->id_a) }}"><i class="fa fa-edit"></i>Editar</a>
                    <form action="{{ route('anamnesis.destroy', $piv->id_a) }}" method="POST" style='display:inline'>   
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
