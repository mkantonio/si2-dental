@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Realizar pago :</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('pagos.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <form method="POST" action="{{route('pagos.update', $plan1->id)}}" accept-charset="UTF-8" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <strong>Codigo del plan:</strong>
              <input placeholder="id" class="form-control" name="id" type="text">
          </div>
      </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Monto Total a Cancelar:</strong>
                <input placeholder="monto_total" class="form-control" name="monto_total" type="text">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Aceptar</button>
        </div>
      </div>

        </form>



@endsection
