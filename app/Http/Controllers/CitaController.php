<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cita;
use App\Models\Paciente;
use App\Models\Persona;
use App\Models\Recepcionista;

class CitaController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $citas = DB::table('cita')
      ->join('paciente', 'cita.idPacient', '=', 'paciente.id')
      ->join('persona', 'paciente.TipoP', '=', 'persona.id')
      ->where('persona.TipoP', '=', 'Paciente')
      ->select('cita.id', 'cita.hora', 'cita.fecha', 'persona.nombre as nombreP', 'persona.apellido as apell')
      ->get();
    return view('citas.index', compact('citas'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    // $personas = DB::table('paciente as pa')
    //   ->select('p.id', 'p.CI', 'p.Nombre', 'p.Apellido', 'p.Sexo', 'p.Direccion', 'p.TipoP', 'pa.TipoP as IdPaciente')
    //   ->join('persona as p', 'p.id', '=', 'pa.TipoP')
    //   ->where('p.TipoP', '=', 'Paciente')
    //   ->get();
    $personas = Paciente::with('persona')->get();
      // dd($personas); die();
    $recepcionistas = Recepcionista::with('persona')->get();
    $agenda = Agenda::agendaLibreOdontologo();
    return view('citas.create', compact('personas', 'recepcionistas', 'agenda'));
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
      'hora' => 'required',
      'fecha' => 'required',
      'agenda_id' => 'required',
      'IdPacient' => 'required',
      'descripcion' => 'required',
      'recepcionista' => 'required',
    ]);

    $cita = Cita::create([
      'Hora' => $request->input('hora'),
      'Fecha' => $request->input('fecha'),
      'IdAgenda' => $request->input('agenda_id'),
      'IdPacient' => $request->IdPacient,
      'IdRecepcionist' => $request->input('recepcionista'),
      'Descripcion' => $request->input('descripcion'),
    ]);

    BitacoraController::store($request, "Nueva Cita Registrada");
    return redirect()->route('citas.index')
      ->with('success', 'Funcion completada existosamente');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $personas = DB::table('persona as p')
      ->select('p.id', 'p.Nombre', 'p.Apellido')
      ->join('paciente', 'paciente.TipoP', '=', 'p.id')
      ->join('cita', 'cita.idPacient', '=', 'paciente.id')
      ->where('cita.id', '=', $id)
      ->get();
    $cita = Cita::find($id);
    return view('citas.show', compact('cita', 'personas'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $personas = DB::table('persona as p')
      ->select('p.id', 'p.nombre')
      ->join('paciente', 'paciente.id', '=', 'p.id')
      ->join('cita', 'cita.idPacient', '=', 'paciente.id')
      ->where('cita.id', '=', $id)
      ->get();
    $cita = Cita::find($id);
    return view('citas.edit', compact('cita', 'personas'));
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

    $citas = Cita::find($id);
    $citas->hora = $request->input('hora');
    $citas->fecha = $request->input('fecha');
    $citas->agenda_id = $request->input('agenda_id');
    $citas->idPacient = $request->input('id');
    $citas->descripcion = $request->input('descripcion');
    $citas->save();

    BitacoraController::store($request, "Cita Reprogramada");

    return redirect()->route('citas.index')
      ->with('success', 'Funcion completada existosamente');
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
