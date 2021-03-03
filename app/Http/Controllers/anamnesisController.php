<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Anamnesis;
use App\Models\Padecimiento;
use App\Models\Historial;

class anamnesisController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $aux = DB::table('anamnesis')
      ->join('historial', 'historial.IdAnamnesis', '=', 'anamnesis.id')
      ->join('paciente', 'historial.IdPaciente', '=', 'paciente.id')
      ->join('persona', 'paciente.TipoP', '=', 'persona.id')
      ->where('persona.tipoP', '=', 'paciente')
      ->select('anamnesis.id as id_a', 'persona.ci', 'persona.nombre as nombreP', 'persona.apellido as apell', 'paciente.fecha')
      ->get();

    return view('anamnesis.index', compact('aux'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)

  {
    $citas = DB::table('anamnesis')
      ->join('historial', 'historial.IdAnamnesis', '=', 'anamnesis.id')
      ->join('paciente', 'historial.IdPaciente', '=', 'paciente.id')
      ->join('persona', 'paciente.TipoP', '=', 'persona.id')
      ->where('persona.TipoP', '=', 'Paciente')
      ->where('anamnesis.id', '=', $id)
      ->select(
        'historial.id',
        'persona.CI',
        'persona.Nombre as nombreP',
        'persona.Apellido as apell',
        'paciente.Fecha',
        'persona.Sexo as sex',
        'persona.Direccion as dir',
        'anamnesis.Estado as es',
        'anamnesis.Descripcion',
        'anamnesis.Pregunta1',
        'anamnesis.Pregunta2',
        'anamnesis.Pregunta3',
        'anamnesis.Pregunta4',
        'anamnesis.Pregunta5'
      )
      ->get();

    $enfermedades = Padecimiento::get();

    $role = DB::table('historial')
      ->join('anamnesis', 'anamnesis.id', '=', 'historial.IdAnamnesis')
      ->join('detalle_anamnesis', 'detalle_anamnesis.IdAnamnesis', '=', 'anamnesis.id')
      ->join('padecimiento', 'padecimiento.id', '=', 'detalle_anamnesis.IdPadecimiento')
      ->where('anamnesis.id', '=', $id)
      ->pluck('detalle_anamnesis.IdAnamnesis', 'detalle_anamnesis.IdPadecimiento')->toArray();

    $role1 = DB::table("detalle_anamnesis")->where("detalle_anamnesis.IdAnamnesis", $id)
      ->pluck('detalle_anamnesis.IdPadecimiento', 'detalle_anamnesis.IdPadecimiento')->toArray();


    $anamnesis = Anamnesis::find($id);
    return view('anamnesis.edit', compact('citas', 'enfermedades', 'role1', 'anamnesis'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $anamnesis = Anamnesis::find($id);
    $anamnesis->Estado = $request->input('estado');
    $anamnesis->Descripcion = $request->input('descripcion');
    $anamnesis->Pregunta1 = $request->input('pregunta1');
    $anamnesis->Pregunta2 = $request->input('pregunta2');
    $anamnesis->Pregunta3 = $request->input('pregunta3');
    $anamnesis->Pregunta4 = $request->input('pregunta4');
    $anamnesis->Pregunta5 = $request->input('pregunta5');
    $anamnesis->save();
    DB::table("detalle_anamnesis")->where("detalle_anamnesis.IdAnamnesis", $id)
      ->delete();
    $anamnesis->padecimientos()->sync($request->get('enfermedades'));


    BitacoraController::store($request, "Anamnesis Modificado");
    return redirect()->route('anamnesis.index')
      ->with('success', 'Operacion realizada con exito');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Request $request, $id)
  {
    DB::table("historial")->where('historial.IdAnamnesis', $id)->delete();
    DB::table("anamnesis")->where('id', $id)->delete();
    DB::table("detalle_anamnesis")->where("detalle_anamnesis.IdAnamnesis", $id)
      ->delete();

    BitacoraController::store($request, "Se Elimino un Odontologo");
    return redirect()->route('anamnesis.index')
      ->with('success', 'Proceso realizado con exito');
  }
}
