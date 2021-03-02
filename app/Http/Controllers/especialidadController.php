<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especialidad;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\EspecialidadStoreRequest;

class especialidadController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $especialidades = Especialidad::orderBy('id', 'DESC')->get();
    return view('especialidades.index', compact('especialidades'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('especialidades.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(EspecialidadStoreRequest $request)
  {


    $especialidades = new Especialidad();
    $especialidades->Nombre = $request->input('Nombre');
    $especialidades->Descripcion = $request->input('Descripcion');
    $especialidades->save();

    BitacoraController::store($request, "Nueva Especialidad Registrada");

    return redirect()->route('especialidades.index')
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
    $especialidad = Especialidad::find($id);
    return view('especialidades.show', compact('especialidad'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $especialidad = Especialidad::find($id);
    return view('especialidades.edit', compact('especialidad'));
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
    $especialidades = Especialidad::find($id);
    $especialidades->fill($request->only('Nombre', 'Descripcion'))->save();
    BitacoraController::store($request, "Especialidad Modificada");
    return redirect()->route('especialidades.index')
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
    DB::table("Especialidad")->where('id', $id)->delete();
    return redirect()->route('especialidades.index')
      ->with('success', 'Persona deleted successfully');
    BitacoraController::store($request, "Especialidad Eliminada");
  }
}
