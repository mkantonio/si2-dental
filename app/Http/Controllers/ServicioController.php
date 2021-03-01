<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tratamiento;
use App\Models\Servicio;
use App\Models\DetalleServicio;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicios=DB::table('servicio')
        ->join('detalle_servicio as ds','ds.IdServicio','=','servicio.id')
        ->join('tratamiento','tratamiento.id','=','ds.idTratamiento')
        ->join('cita','cita.id','=','ds.IdCita')
        ->join('odontologo','odontologo.id','=','ds.IdOdontologo')
        ->join('persona','persona.id','=','odontologo.id')
        ->where('persona.tipoP','=','odontologo')
        ->select('servicio.id','ds.*','tratamiento.nombre as name','cita.id as idcita','persona.nombre as name1','persona.apellido as apelli')
        ->get();
        return view('servicios.index',compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

       $tratamiento=DB::table('tratamiento')
       ->select('tratamiento.*')
       ->get();

       $cita=DB::table('cita')
       ->join('paciente','paciente.id','=','cita.idPacient')
       ->join('persona','persona.id','=','paciente.id')
       ->where('persona.tipoP','=','paciente')
       ->select('cita.id','persona.nombre as name','persona.apellido as apell')
       ->get();
       $persona=DB::table('persona')
       ->join('odontologo','odontologo.id','=','persona.id')
       ->where('persona.tipoP','=','odontologo')
       ->select('persona.id','persona.nombre','persona.apellido')
       ->get();
        return view('servicios.create',compact('cita','tratamiento','persona'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $servicio=new Servicio();
        $servicio->tipo=$request->input('pregunta2');
        $servicio->save();

        $detalle=new DetalleServicio();
        $detalle->IdServicio=$servicio->id;
        $detalle->idTratamiento=$request->input('id_trata');
        $detalle->IdCita=$request->input('id_cita');
        $detalle->IdOdontologo=$request->input('id');
        $detalle->save();  
        // dd($detalle); die();


        BitacoraController::store ($request,"Registro de Servicio");

           return redirect()->route('servicios.index')
           ->with('warning','Funcion completada existosamente');

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
