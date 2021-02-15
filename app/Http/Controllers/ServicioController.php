<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
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
        ->join('detalle_servicio as ds','ds.servicio_id','=','servicio.id')
        ->join('tratamiento','tratamiento.id','=','ds.tratamiento_id')
        ->join('cita','cita.id','=','ds.cita_id')
        ->join('odontologo','odontologo.id','=','ds.odontologo_id')
        ->join('persona','persona.id','=','odontologo.id')
        ->where('persona.tipo','=','odontologo')
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
       ->join('paciente','paciente.id','=','cita.id_paciente')
       ->join('persona','persona.id','=','paciente.id')
       ->where('persona.tipo','=','paciente')
       ->select('cita.id','persona.nombre as name','persona.apellido as apell')
       ->get();
       $persona=DB::table('persona')
       ->join('odontologo','odontologo.id','=','persona.id')
       ->where('persona.tipo','=','odontologo')
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
        $detalle->servicio_id=$servicio->id;
        $detalle->tratamiento_id=$request->input('id_trata');
        $detalle->cita_id=$request->input('id_cita');
        $detalle->odontologo_id=$request->input('id');
        $detalle->save();


        BitacoraController::store ($request,"Registrar Historial");

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
