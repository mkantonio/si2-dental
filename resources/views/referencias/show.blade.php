@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Referencia</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('referencias.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre:</strong>
                {{ $referencia->nombre }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Apellido:</strong>
                {{ $referencia->apellido }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Telefono:</strong>
                {{ $referencia->telefono }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Relacion:</strong>
                {{ $referencia->relacion }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                @if(!empty($persona))
                @foreach($persona as $p)
                <strong>Ci Cliente:</strong>&nbsp;{{ $p->cf }}&nbsp;&nbsp;
                        <strong>Nombre:</strong>&nbsp;{{ $p->ncl }} &nbsp;{{ $p->acl}}
                    @endforeach
                    @endif
            </div>
        </div>

    </div>
@endsection