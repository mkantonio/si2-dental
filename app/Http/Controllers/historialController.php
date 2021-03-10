<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Padecimiento;
use Illuminate\Support\Facades\DB;
use App\Models\Historial;
use App\Models\Anamnesis;
use App\Models\Persona;

class historialController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $historiales = DB::table('historial')
      ->join('odontograma', 'odontograma.id', '=', 'historial.IdOdontograma')
      ->join('paciente', 'paciente.id', '=', 'odontograma.IdPaciente')
      ->join('persona', 'persona.id', '=', 'paciente.TipoP')
      ->where('persona.TipoP', '=', 'Paciente')
      ->select('historial.id', 'persona.CI', 'persona.Nombre as nombreP', 'persona.Apellido as apell', 'paciente.Fecha')
      ->get();

    return view('historiales.index', compact('historiales'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $enfermedades = Padecimiento::get();
    $personas = DB::table('paciente as pa')
      ->select('p.id', 'p.CI', 'p.Nombre', 'p.Apellido', 'p.Sexo', 'p.Direccion', 'p.TipoP')
      ->join('persona as p', 'p.id', '=', 'pa.TipoP')
      ->where('p.TipoP', '=', 'Paciente')
      ->get();
    // dd($enfermedades); die();
    $odontogramas = DB::table('odontograma')
      ->select('odontograma.id')
      ->get();
    return view('historiales.create', compact('enfermedades', 'personas', 'odontogramas'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {


    $this->validate($request, [
      'IdPaciente' => 'required',
      'IdOdontograma' => 'required',
      'pregunta1' => 'required',
      'pregunta2' => 'required',
      'pregunta3' => 'required',
      'pregunta4' => 'required',
      'pregunta5' => 'required',
      'descripcion' => 'required',
      'enfermedades' => 'required',
    ]);

    $persona = Persona::find($request->IdPaciente);
    $anamnesis = Anamnesis::create([
      'Estado' => $request->input('estado'),
      'Descripcion' => $request->input('descripcion'),
      'Pregunta1' => $request->input('pregunta1'),
      'Pregunta2' => $request->input('pregunta2'),
      'Pregunta3' => $request->input('pregunta3'),
      'Pregunta4' => $request->input('pregunta4'),
      'Pregunta5' => $request->input('pregunta5'),
      'IdPaciente' => $persona->paciente->id,
    ]);
    // $anamnesis = new Anamnesis();
    // $anamnesis->Estado = $request->input('estado');
    // $anamnesis->Descripcion = $request->input('descripcion');
    // $anamnesis->Pregunta1 = $request->input('pregunta1');
    // $anamnesis->Pregunta2 = $request->input('pregunta2');
    // $anamnesis->Pregunta3 = $request->input('pregunta3');
    // $anamnesis->Pregunta4 = $request->input('pregunta4');
    // $anamnesis->Pregunta5 = $request->input('pregunta5');
    // $anamnesis->save();
    $anamnesis->padecimientos()->sync($request->get('enfermedades'));

    $historial = Historial::create([
      'IdAnamnesis' => $anamnesis->id,
      'IdOdontograma' => $request->IdOdontograma,
    ]);
    // $historial = new Historial();
    // $historial->paciente_id = $request->input('id');
    // $historial->anamnesis_id = $anamnesis->id;
    // $historial->odontograma_id = $request->input('id_odonto');
    // $historial->save();

    BitacoraController::store($request, "Registrar Historial");

    return redirect()->route('historiales.index')
      ->with('warning', 'Funcion completada existosamente');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {

    $citas = DB::table('historial')
      // ->join('paciente', 'paciente.id', '=', 'historial.IdPaciente')
      ->join('anamnesis', 'anamnesis.id', '=', 'historial.IdAnamnesis')
      ->join('paciente', 'paciente.id', '=', 'anamnesis.IdPaciente')
      ->join('cita', 'cita.idPacient', '=', 'paciente.id')
      ->join('detalle_servicio', 'detalle_servicio.IdCita', '=', 'cita.id')
      ->join('tratamiento', 'tratamiento.id', '=', 'detalle_servicio.idTratamiento')
      ->join('odontologo', 'odontologo.id', '=', 'detalle_servicio.IdOdontologo')
      ->join('persona', 'persona.id', '=', 'odontologo.TipoP')
      ->where('persona.TipoP', '=', 'Odontologo')
      ->where('historial.id', '=', $id)
      ->select('persona.Nombre as name', 'tratamiento.Nombre as name1', 'cita.id as id_cita')
      ->get();


    return view('historiales.show', compact('citas'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $citas = DB::table('historial')
      ->join('odontograma', 'historial.IdOdontograma', '=', 'odontograma.id')
      ->join('paciente', 'odontograma.IdPaciente', '=', 'paciente.id')
      ->join('persona', 'paciente.TipoP', '=', 'persona.id')
      ->join('anamnesis', 'historial.IdAnamnesis', '=', 'anamnesis.id')
      ->where('persona.tipoP', '=', 'Paciente')
      ->where('historial.id', '=', $id)
      ->select(
        'historial.id',
        'persona.ci',
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
      ->where('historial.id', '=', $id)
      ->pluck('detalle_anamnesis.IdAnamnesis', 'detalle_anamnesis.IdPadecimiento')->toArray();

    $role1 = DB::table("detalle_anamnesis as deta")
      ->join('anamnesis', 'anamnesis.id', '=', 'deta.IdAnamnesis')
      ->join('historial', 'historial.IdAnamnesis', '=', 'anamnesis.id')
      ->where('historial.id', '=', $id)
      ->pluck('deta.IdPadecimiento', 'deta.IdPadecimiento')->toArray();

    $historial = Historial::find($id);
    return view('historiales.edit', compact('citas', 'enfermedades', 'role1', 'historial'));
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
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
