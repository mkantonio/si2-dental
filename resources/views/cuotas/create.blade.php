@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Pago de Cuota</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('cuotas.index') }}"> Back</a>
            </div>
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::open(array('route' => 'cuotas.store','method'=>'POST')) !!}


      <div class="col-xs-10 col-sm-12 col-md-10">
          <div class="form-group">
              <h4>Lista de Los Pacientes :</h4>
              <select name="id_pa" class="form-control" id="id">
                  @foreach ($plan as $ac)
                      <option value="{{$ac->id_p}}">
                          {{$ac->id_plan}}_{{$ac->name}}</option>
                  @endforeach
              </select>
          </div>
      </div>

      <div class="col-lg-12 col-xs-12 col-sm-6 col-md-6" style="min-width:500px;height:150px" >
          <div class="alert alert-danger">
              <h3><strong>Lista de servicios</strong></h3>
            <div class="form-group">
            <ul class="list-unstyled">
            @foreach($servicio as $piv)
              <label>
                {{ Form::checkbox('servicios[]', $piv->id_s, null) }} Numero de Servicio:-{{$piv->id_s}}--{{ $piv->name}}
              </label>
            @endforeach
            </ul>
            </div>
          </div>
        </div>

        <div class="col-lg-12 col-xs-12 col-sm-6 col-md-6" style="min-width:500px;height:150px" >
            <div class="alert alert-danger">
                <h3><strong>Monto de servicios</strong></h3>
              <div class="form-group">
              <ul class="list-unstyled">
              @foreach($servicio as $piv)
                <label>
                  {{ Form::checkbox('costos[]', $piv->tc, null) }} Numero de Servicio:__{{$piv->id_s}}-{{ $piv->name}}-{{$piv->tc}}
                </label>
              @endforeach
              </ul>
              </div>
            </div>
          </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <div class="form-group">
                <button onclick="myFunction()" type="submit" class="btn btn-primary">Aceptar</button>
            </div>
        </div>

    </div>

    {!! Form::close() !!}
