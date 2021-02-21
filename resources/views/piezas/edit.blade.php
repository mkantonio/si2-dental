@extends('layouts.admin')
@section('content')
<center>
<h3>Nuevo Odontograma</h3>
    <form method="POST" action="{{route('piezas.update', $prueba->id)}}" accept-charset="UTF-8" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
<div class="row">
<div class="container">
  <img src="{{asset('imagenes/odonto1.jpg')}}" alt="Odontograma" width="1000" height="200">
  <form>
    <br>
    <div class="col-lg-12 col-xs-12 col-sm-6 col-md-6">
        <div class="alert-danger">
        <h4>Lista de Enfermedades</h4>
          <div class="form-group">
          <ul class="list-unstyled">
            @foreach($prueba as $value)
                <label><input name="prueba[]" type="checkbox">
                    {{ $value->id}}
                  </label>
            @endforeach
          </ul>
          </div>
        </div>
      </div>
    <label class="checkbox-inline">
      <input type="checkbox" value="2do Molar superior derecho" name="17">17
    </label>

    <label class="checkbox-inline">
      <input type="checkbox" value="1er Molar superior derecho" name="16">16
    </label>
    <label class="checkbox-inline">
      <input type="checkbox" value="2do Premolar superior derecho" name="15">15
    </label>
    <label class="checkbox-inline">
      <input type="checkbox" value="1er Premolar superior derecho" name="14">14
    </label>
    <label class="checkbox-inline">
      <input type="checkbox" value="Canino superior derecho" name="13">13
    </label>
    <label class="checkbox-inline">
      <input type="checkbox" value="Incisivo lateral superior derecho" name="12">12
    </label>
    <label class="checkbox-inline">
      <input type="checkbox" value="Incisivo Central superior derecho" name="11">11
    </label>


    <label class="checkbox-inline">
      <input type="checkbox" value="Incisivo Central superior izquierdo" name="21">21
    </label>

    <label class="checkbox-inline">
      <input type="checkbox" value="Incisivo lateral superior izquierdo" name="22">22
    </label>

    <label class="checkbox-inline">
      <input type="checkbox" value="Canino superior izquierdo" name="23">23
    </label>
    <label class="checkbox-inline">
      <input type="checkbox" value="1er Premolar superior izquierdo" name="24">24
    </label>
    <label class="checkbox-inline">
      <input type="checkbox" value="2er Premolar superior izquierdo" name="25">25
    </label>
    <label class="checkbox-inline">
      <input type="checkbox" value="1er Molar superior izquierdo" name="26">26
    </label>
    <label class="checkbox-inline">
      <input type="checkbox" value="2er Molar superior izquierdo" name="27">27
    </label>
    <label class="checkbox-inline">
      <input type="checkbox" value="3er Molar superior izquierdo" name="28">28
    </label>
    <br>
      <img src="{{asset('imagenes/odonto2.jpg')}}" alt="Odontograma" width="1000" height="200">
      <br>
    <label class="checkbox-inline">
      <input type="checkbox" value="3er Molar inferior derecho" name="48">48
    </label>
    <label class="checkbox-inline">
      <input type="checkbox" value="2er Molar inferior derecho" name="47">47
    </label>
    <label class="checkbox-inline">
      <input type="checkbox" value="1er Molar inferior derecho" name="46">46
    </label>
    <label class="checkbox-inline">
      <input type="checkbox" value="2do Premolar inferior derecho" name="45">45
    </label>
    <label class="checkbox-inline">
      <input type="checkbox" value="1do Premolar inferior derecho" name="44">44
    </label>
    <label class="checkbox-inline">
      <input type="checkbox" value="Canino inferior derecho" name="43">43
    </label>

    <label class="checkbox-inline">
      <input type="checkbox" value="Incisivo lateral inferior derecho" name="42">42
    </label>
    <label class="checkbox-inline">
      <input type="checkbox" value="Incisivo Central inferior derecho" name="41">41
    </label>

    <label class="checkbox-inline">
      <input type="checkbox" value="Incisivo Central inferior izquierdo" name="31">31
    </label>
    <label class="checkbox-inline">
      <input type="checkbox" value="Incisivo lateral inferior izquierdo" name="32">32
    </label>
    <label class="checkbox-inline">
      <input type="checkbox" value="Canino inferior izquierdo" name="33">33
    </label>
    <label class="checkbox-inline">
      <input type="checkbox" value="1er Premolar inferior izquierdo" name="34">34
    </label>
    <label class="checkbox-inline">
      <input type="checkbox" value="2er Premolar inferior izquierdo" name="35">35
    </label>
    <label class="checkbox-inline">
      <input type="checkbox" value="1er Molar inferior izquierdo" name="36">36
    </label>
    <label class="checkbox-inline">
      <input type="checkbox" value="2er Molar inferior izquierdo" name="37">37
    </label>
    <label class="checkbox-inline">
      <input type="checkbox" value="3er Molar inferior izquierdo" name="38">38
    </label>



  </form>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <div class="form-group">
        <button onclick="myFunction()" type="submit" class="btn btn-danger">Aceptar</button>
    </div>
</div>
</div>
</form>


@endsection
