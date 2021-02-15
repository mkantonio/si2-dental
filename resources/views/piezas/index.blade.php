@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
          <h1 style="text-align:center;">Piezas de los Paciente</h1>
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
                <th>Nombre del Paciente</th>
                <th>Apellido </th>

                <th width="280px">Action</th>
            </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        @foreach ($detalle as $key => $piv)
            <tr>

                <td>{{$piv->id}}</td>
                <td>{{ $piv->nombreP }}</td>
                <td>{{ $piv->apell }}</td>

                <td>
      <a class="btn btn-info"  style="min-width: 35px;height: 35px"
      href="{{ route('odontogramas.show',$piv->id) }}"><i class=""></i>Detalles del Odontograma</a>

                </td>
            </tr>
        @endforeach
        </tbody>


    </table>
@endsection
