<?php

namespace App\Http\Controllers;

use App\Models\Tratamiento;
use Illuminate\Http\Request;

class TratamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tratamientos = Tratamiento::all();
        return view('tratamiento.index', compact('tratamientos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tratamiento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tratamiento = new Tratamiento();
        $tratamiento->Nombre = $request->input('Nombre');
        $tratamiento->Costo = $request->input('Costo');
        $tratamiento->Descripcion = $request->input('Descripcion');
        $tratamiento->NroDiasTratamiento = 1;
        $tratamiento->NroDiasAsistidas = 1;
        $tratamiento->NroDiasNoAsistidas = 1;
        $tratamiento->save();
        BitacoraController::store($request, "Datos Tratamiento Creados");
        return redirect()->route('tratamiento.index')
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
        $tratamiento = Tratamiento::find($id);
        return view('tratamiento.show', compact('tratamiento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tratamiento = Tratamiento::find($id);
        return view('tratamiento.edit', compact('tratamiento'));
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
        $tratamiento = Tratamiento::find($id);
        $tratamiento->Nombre = $request->input('Nombre');
        $tratamiento->Costo = $request->input('Costo');
        $tratamiento->Descripcion = $request->input('Descripcion');
        $tratamiento->save();
        BitacoraController::store($request, "Datos Tratamiento Modificadados");
        return redirect()->route('tratamiento.index')
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
        $tratamiento = Tratamiento::find($id);
        $tratamiento->delete();
        BitacoraController::store($request, "Datos Tratamiento Eliminados");
        return redirect()->route('tratamiento.index')
            ->with('success', 'Funcion completada existosamente');
    }
}
