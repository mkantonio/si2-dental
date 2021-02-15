@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
          <h1 style="text-align:center;">Piezas del Paciente</h1>


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
            </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        @foreach ($aux as $key => $piv)
            <tr>
                <td>{{$piv->dn}}</td>
                <td>{{$piv->des}}</td>
            </tr>
        @endforeach
        </tbody>


    </table>
@endsection
