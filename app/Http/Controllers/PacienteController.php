<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Paciente;
use App\Models\Historial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PacienteStoreRequest;

class PacienteController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $personas = DB::table('paciente as pa')
      ->join('persona as p', 'p.id', '=', 'pa.TipoP')
      ->select('p.id', 'p.CI', 'p.Nombre', 'p.Apellido', 'p.Sexo', 'p.Direccion', 'p.TipoP')
      ->where('p.TipoP', '=', 'Paciente')
      ->get();

    return view('pacientes.index', compact('personas'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('pacientes.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(PacienteStoreRequest $request)
  {
    if (!$request->paciente) {
      return redirect()->route('paciente.create')
        ->with('error', 'Debe especificar que es un paciente');
    }

    $persona = Persona::create([
      'CI' => $request->input('CI'),
      'Nombre' => $request->input('Nombre'),
      'Apellido' => $request->input('Apellido'),
      'Sexo' => $request->input('Sexo'),
      'Direccion' => $request->input('Direccion'),
      'TipoP' => 'Paciente',
    ]);

    $odontologo = Paciente::create([
      'Fecha' => $request->input('Fecha'),
      'TipoP' => $persona->id,
    ]);

    BitacoraController::store($request, "Registrar de Nuevo Paciente");
    return redirect()->route('pacientes.index')
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

    $persona = Persona::find($id);
    return view('pacientes.show', compact('persona'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $persona = Persona::find($id);
    $paciente = Paciente::find($persona->paciente->id);
    return view('pacientes.edit', compact('persona', 'paciente'));
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
    $persona = Persona::find($id);
    $persona->CI = $request->input('ci');
    $persona->Nombre = $request->input('nombre');
    $persona->Apellido = $request->input('apellido');
    $persona->Sexo = $request->input('sexo');
    $persona->Direccion = $request->input('direccion');
    $persona->save();

    BitacoraController::store($request, "Modifiacion de datos Paciente");

    return redirect()->route('pacientes.index')
      ->with('success', 'Funcion completada existosamente');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Request $request, $id)
  {
    $persona = Persona::find($id);
    $paciente = Paciente::find($persona->paciente->id)->delete();
    $persona->delete();

    BitacoraController::store($request, "Paciente Eliminado");
    return redirect()->route('pacientes.index')
      ->with('success', 'Proceso realizado con exito');
  }
}
