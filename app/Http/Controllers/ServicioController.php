<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tratamiento;
use App\Models\Servicio;
use App\Models\DetalleServicio;
use App\Models\Odontologo;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicios = DB::table('servicio')
            ->join('detalle_servicio as ds', 'ds.IdServicio', '=', 'servicio.id')
            ->join('tratamiento', 'tratamiento.id', '=', 'ds.IdTratamiento')
            ->join('cita', 'cita.id', '=', 'ds.IdCita')
            ->join('odontologo', 'odontologo.id', '=', 'ds.IdOdontologo')
            ->join('persona', 'persona.id', '=', 'odontologo.TipoP')
            ->where('persona.TipoP', '=', 'Odontologo')
            ->select('servicio.id', 'ds.*', 'tratamiento.nombre as name', 'cita.id as idcita', 'persona.nombre as name1', 'persona.apellido as apelli')
            ->get();
        return view('servicios.index', compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tratamientos = Tratamiento::all();
        $cita = DB::table('cita')
            ->join('paciente', 'paciente.id', '=', 'cita.idPacient')
            ->join('persona', 'persona.id', '=', 'paciente.TipoP')
            ->where('persona.TipoP', '=', 'Paciente')
            ->select('cita.id', 'persona.nombre as name', 'persona.apellido as apell')
            ->get();

        $odontologos = Odontologo::with('persona')->get();

        // $personas = DB::table('persona')
        //     ->join('odontologo', 'odontologo.TipoP', '=', 'persona.id')
        //     ->where('persona.TipoP', '=', 'Odontologo')
        //     ->select('persona.id', 'persona.nombre', 'persona.apellido')
        //     ->get();
        return view('servicios.create', compact('cita', 'tratamientos', 'odontologos'));
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
            'IdOdontologo' => 'required',
            'IdCita' => 'required',
            'Tipo' => 'required',
            'tratamiento' => 'required',
        ]);
        $tratamiento = Tratamiento::find($request->tratamiento);
        $servicio = new Servicio();
        $servicio->Tipo = $request->input('Tipo');
        $servicio->save();
        // $odontologo = Odontologo::where('TipoP', '=', $request->IdOdontologo)->with('persona')->get();

        $detalle = DetalleServicio::create([
            'IdOdontologo' => $request->IdOdontologo,
            'IdCita' => $request->IdCita,
            'IdServicio' => $servicio->id,
            'IdTratamiento' => $tratamiento->id,
        ]);
        // $detalle = new DetalleServicio();
        // $detalle->IdOdontologo = $request->IdOdontologo;
        // $detalle->IdCita = $request->input('IdCita');
        // $detalle->IdServicio = $servicio->id;
        // $detalle->IdTratamiento = $request->tratamiento;
        // $detalle->save();
        // dd($detalle); die();
        BitacoraController::store($request, "Registro de Servicio");
        return redirect()->route('servicios.index')
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
        //
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
        //
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
