<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Padecimiento;
use DB;
class padecimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $padecimientos = Padecimiento::orderBy('id','DESC')->get();
     return view('padecimientos.index',compact('padecimientos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('padecimientos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $padecimientos = new Padecimiento();
      $padecimientos ->nombre = $request->input('nombre');
      $padecimientos ->descripcion = $request->input('descripcion');
      $padecimientos ->save();

  BitacoraController::store ($request,"Nueva Enfermedad Registrada");

        return redirect()->route('padecimientos.index')
       ->with('success','Funcion completada existosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $padecimiento=Padecimiento::find($id);
      return view('padecimientos.show',compact('padecimiento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $padecimiento=Padecimiento::find($id);
      return view('padecimientos.edit',compact('padecimiento'));
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
      $padecimientos= Padecimiento::find($id);
      $padecimientos ->nombre = $request->input('nombre');
      $padecimientos ->descripcion = $request->input('descripcion');
      $padecimientos ->save();
  BitacoraController::store ($request,"Enfermedad Modificada");
      return redirect()->route('padecimientos.index')
      ->with('success','Funcion completada existosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      DB::table("Padecimiento")->where('id',$id)->delete();
      return redirect()->route('padecimientos.index')
          ->with('success','Persona deleted successfully');
            BitacoraController::store ($request,"Especialidad Eliminada");
    }
}
