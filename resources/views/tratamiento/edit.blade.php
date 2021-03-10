@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Editar Tratamiento:</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('tratamiento.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <form method="POST" action="{{ route('tratamiento.update', $tratamiento->id) }}" accept-charset="UTF-8"
        enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input placeholder="Nombre" class="form-control" name="Nombre" type="text"
                        value="{{ $tratamiento->Nombre }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Costo:</strong>
                    <input placeholder="Nombre" class="form-control" name="Costo" type="number"
                        value="{{ $tratamiento->Costo }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Descripcion:</strong>
                    <input placeholder="Descripcion" class="form-control" name="Descripcion" type="text"
                        value="{{ $tratamiento->Descripcion }}">
                </div>
            </div>

            
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Aceptar</button>
            </div>
        </div>

    </form>



@endsection
