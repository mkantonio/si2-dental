@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>Administracion de Cargos</h1>
            </div>
            <div class="pull-right">
                <a class="btn btn-app" href="{{ route('roles.create') }}"><i class="fa  fa-plus"></i>
                    Registrar Cargo
                </a>
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
            <th>No</th>
            <th>Name</th>
            <th>Description</th>
            <th width="280px">Action</th>
        </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        @foreach ($roles as $key => $role)
            <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->display_name }}</td>
                <td>{{ $role->description }}</td>
                <td>
                    <a class="btn btn-app" style="min-width: 60px;height: 60px" href="{{ route('roles.show',$role->id) }}"><i class="fa  fa-info"></i>
                        Show
                    </a>
                    <a class="btn btn-app"  style="min-width: 60px;height: 60px" href="{{ route('roles.edit',$role->id) }}"><i class="fa fa-edit"></i>
                        Editar
                    </a>
                    <a class="btn btn-app"  style="min-width: 60px;height: 60px" href="" data-target="#modal-delete-{{$role->id}}" data-toggle="modal"><i class="fa fa-trash-o"></i>
                        Eliminar
                    </a>
                </td>
            </tr>
            @include('roles.modal')
        @endforeach
        </tbody>
    </table>

@endsection