@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Informacion :</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('especialidades.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>id:</strong>
                <p style="font-size: 24px">{{ $especialidad->id }}</p>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre:</strong>
                <p style="font-size: 24px">{{ $especialidad->Nombre }}</p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descripcion:</strong>
                <p style="font-size: 24px">{{ $especialidad->Descripcion }}</p>
            </div>
        </div>


    </div>
@endsection
