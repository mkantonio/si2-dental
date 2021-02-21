@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>Administrar Usuarios</h1>
            </div>
            <div class="pull-right">

                <a class="btn btn-app" href="{{ route('users.create') }}"><i class="fa  fa-user-plus"></i>
                    Registrar Usuario
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
            <th>Email</th>
            <th>Roles</th>
            <th width="280px">Action</th>
        </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        @foreach ($data as $key => $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->nombrerole }}</td>
                <td>
                    <a class="btn btn-app" style="min-width: 60px;height: 60px" href="{{ route('users.show',$user->id) }}"><i class="fa  fa-info"></i>
                        Show
                    </a>
                    <a class="btn btn-app"  style="min-width: 60px;height: 60px" href="{{ route('users.edit',$user->id) }}"><i class="fa fa-edit"></i>
                        Editar
                    </a>
                    <a class="btn btn-app"  style="min-width: 60px;height: 60px" href="" data-target="#modal-delete-{{$user->id}}" data-toggle="modal"><i class="fa fa-trash-o"></i>
                        Eliminar
                    </a>
                </td>
            </tr>
            @include('users.modal')
        @endforeach
        </tbody>
    </table>

@endsection

<script>
    //console.log({{ request()->route()->uri }});
    console.log("{{ (request()->is('users'||'bitacoras'||'roles'||'home')) ? 'aaa' : 'b' }}");
    console.log({{ (request()->is('users'))  }});


</script>
