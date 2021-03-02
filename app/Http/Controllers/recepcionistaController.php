<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\Recepcionista;
use Illuminate\Support\Facades\DB;

class recepcionistaController extends Controller
{

  protected $nuevaPersona;
  protected $nuevaRecepcionista;

  public function __construct(Persona $nuevaPersona, Recepcionista $nuevaRecepcionista)
  {
    $this->nuevaPersona = $nuevaPersona;
    $this->nuevaRecepcionista = $nuevaRecepcionista;
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $personas = Recepcionista::with('persona')->get();
    return view('recepcionistas.index', compact('personas'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('recepcionistas.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $this->validate($request, ['CI' => 'required', 'Nombre' => 'required', 'Apellido' => 'required', 'Sexo' => 'required', 'Direccion' => 'required',]);

    $persona = $this->nuevaPersona->nuevaRecepcionista($request);
    $recepcionista = $this->nuevaRecepcionista->nuevaRecepcionista($request, $persona);
    BitacoraController::store($request, "Registrar de Nueva Recepcionista");
    return redirect()->route('recepcionistas.index')
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
    $persona = Recepcionista::where('id',$id)->with('persona')->first();
    return view('recepcionistas.show', compact('persona'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $persona = Recepcionista::where('id',$id)->with('persona')->first();
    return view('recepcionistas.edit', compact('persona'));
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
    $persona->CI = $request->input('CI');
    $persona->Nombre = $request->input('Nombre');
    $persona->Apellido = $request->input('Apellido');
    $persona->Sexo = $request->input('Sexo');
    $persona->Direccion = $request->input('Direccion');
    $persona->TipoP = 'Recepcionista';
    $persona->save();

    BitacoraController::store($request, "Datos modificados Recepcionista");
    return redirect()->route('recepcionistas.index')
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
    $r = Recepcionista::find($id);
    DB::table("Persona")->where('id', $r->TipoP)->delete();
    $r->delete();
    BitacoraController::store($request, "Eliminacion de Recepcionista");
    return redirect()->route('recepcionistas.index')
      ->with('success', 'Proceso realizado con exito');
  }
}
