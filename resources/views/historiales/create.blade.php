@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Registro de Historial </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('historiales.index') }}"> Back</a>
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
    {!! Form::open(array('route' => 'historiales.store','method'=>'POST')) !!}


      <div class="col-xs-10 col-sm-12 col-md-10">
          <div class="form-group">
              <h4>Lista de Los Pacientes :</h4>
              <select name="id" class="form-control" id="id">
                  @foreach ($personas as $ac)
                      <option value="{{$ac->id}}">
                          {{$ac->nombre}}_{{$ac->apellido}}</option>
                  @endforeach
              </select>
          </div>
      </div>
      <div class="col-xs-10 col-sm-12 col-md-10">
          <div class="form-group">
              <h4>Codigo de Odontograma  :</h4>
              <select name="id_odonto" class="form-control" id="id">
                  @foreach ($odontogramas as $ac)
                      <option value="{{$ac->id}}">
                          {{$ac->id}}</option>
                  @endforeach
              </select>
          </div>
      </div>
         <div class="row">
          <div class="col-lg-10 col-xs-12 col-sm-6 col-md-6">
            <center>
               <h3>Antecedentes Generales</h3>

               <div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
                   <div class="form-group">
                     <div class="alert-success">
                       <strong>Esta en tratamiento Medico</strong>
                      {!! Form::text('pregunta1', null, array('placeholder' => 'Que Tratamiento es?','class' => 'form-control')) !!}
                   </div>
                 </div>
               </div>

               <div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
                   <div class="form-group">
                     <div class="alert-success">
                       <strong>Sufre de Alergias:</strong>
                       <select name="pregunta2" class="form-control">
                           <option value="antibioticos">Antibioticos</option>
                           <option value="anastesicos">Anastesicos</option>
                           <option  value="eugenol">Eugenol</option>
                           <option value="mercurio">Mercurio</option>
                                    <option value="mercurio">Otros</option>
                       </select>
                   </div>
                 </div>
               </div>



               <div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
                   <div class="form-group">
                     <div class="alert-success">
                       <strong>Presion Arterial:</strong>
                       <select name="pregunta3" class="form-control">
                           <option value="alta">Alta</option>
                           <option value="baja">Baja</option>
                       </select>
                   </div>
                 </div>
               </div>
               <div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
                   <div class="form-group">
                     <div class="alert-success">
                       <strong>Fobias Del Paciente:</strong>
                       <select name="pregunta4" class="form-control">
                           <option value="Sangre">Fobia a la Sangre</option>
                           <option value="Inyecciones">Inyecciones de Agujas</option>
                           <option value="Animales">Animales</option>
                           <option value="otros">Otros</option>
                       </select>
                   </div>
                 </div>
               </div>

              <center>
                          <h3>Habitos de vida</h3>
               <div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
                   <div class="form-group">
                     <div class="alert-success">
                       <strong>Frecuencia de Cepillado:</strong>
                       <select name="pregunta5" class="form-control">
                           <option value="una">Una vez al Dia</option>
                           <option value="dos">Dos veces al Dia</option>
                           <option  value="tres">Tres veces al Dia</option>
                           <option value="nunca">Nunca</option>
                       </select>
                   </div>
                 </div>
               </div>
               <div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
                   <div class="form-group">
                     <div class="alert-success">
                       <strong>Usted:</strong>
                       <select name="pregunta6" class="form-control">
                           <option value="fuma">Fuma</option>
                           <option value="bebe">Toma bebidas Alchoolicas</option>
                           <option  value="ingiere">Consume algun tipo de Drogra</option>
                           <option value="nunca">Ninguna</option>
                       </select>
                   </div>
                 </div>
               </div>

               <div class="col-lg-6 col-xs-12 col-sm-4 col-md-4">
                   <div class="form-group">
                     <div class="alert-success">
                       <strong>Estado:</strong>
                       <select name="estado" class="form-control">
                           <option value="bien">Saludable</option>
                           <option value="mal">Enfermo</option>
                           <option value="regular">Regular</option>
                       </select>
                   </div>
                 </div>
               </div>

               <div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
                   <div class="form-group">
                     <div class="alert-success">
                       <strong>Descripcion del Paciente:</strong>
                       {!! Form::textarea('descripcion', null, array('placeholder' => 'Descripcion','class' => 'form-control','rows="4" cols="40"')) !!}
                   </div>
                 </div>
               </div>


            <div class="col-lg-12 col-xs-12 col-sm-6 col-md-6">

                      <div class="alert-danger">
                <h3>Lista de Enfermedades</h3>
                  <div class="form-group">
                  <ul class="list-unstyled">
                  @foreach($enfermedades as $enfermedad)
                    <label>
                      {{ Form::checkbox('enfermedades[]', $enfermedad->id, null) }} {{ $enfermedad->nombre}}
                    </label>
                  @endforeach
                  </ul>
                  </div>
                </div>
              </div>
            </div>


        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <div class="form-group">
                <button onclick="myFunction()" type="submit" class="btn btn-danger">Aceptar</button>
            </div>
        </div>

    </div>

    {!! Form::close() !!}


@endsection
