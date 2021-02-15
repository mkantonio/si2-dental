@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
          <h1 style="text-align:center;">Planes de Pagos de Los Pacientes</h1>


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
                <th>Numero de Plan de Pagos</th>
                <th>Nombre del Paciente</th>
                <th>Apellido</th>
                <th>Monto Total</th>

                <th width="280px">Action</th>
            </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        @foreach ($detalle as $key => $piv)
            <tr>
                <td>{{$piv->id}}</td>
                <td>{{$piv->name}}</td>
                <td>{{ $piv->name1}}</td>
                <td>{{ $piv->monto_total }}</td>

                <td>
                    <a class="btn btn-success" style="min-width: 35px;height: 35px"href="
                    {{ route('pagos.edit',$piv->id) }}"><i class="fa fa-edit"></i>Pagar Deuda</a>

                </td>
            </tr>
        @endforeach
        </tbody>


    </table>
@endsection
