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
    {!! Form::model($plan1, ['method' => 'PATCH','route' => ['pagos.update', $plan1->id],'files'=>'true']) !!}
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <strong>Codigo del plan:</strong>
                    {!! Form::text('id', null, array('placeholder' => 'name','class' => 'form-control')) !!}
          </div>
      </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Monto Total a Cancelar:</strong>
                      {!! Form::text('monto_total', null, array('placeholder' => 'name','class' => 'form-control')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Aceptar</button>
        </div>
      </div>

        {!! Form::close() !!}



@endsection
