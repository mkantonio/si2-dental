<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\PlanPago;
class planController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detalle=DB::table('plan_pago')
        ->join('paciente','paciente.id','=','plan_pago.paciente_id')
        ->join('persona','persona.id','=','paciente.id')
        ->where('persona.tipo','=','paciente')
        ->select('plan_pago.id','persona.nombre as name','persona.apellido as name1','plan_pago.monto_total')
        ->get();
        return view('pagos.index',compact('detalle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $persona=DB::table('paciente')
        ->join('persona','persona.id','=','paciente.id')
        ->where('persona.tipo','=','paciente')
        ->select('persona.nombre as name','persona.id as id_p','persona.apellido as name1')
        ->get();

        $servicio=DB::table('servicio')
        ->join('detalle_servicio as ds','ds.servicio_id','=','servicio.id')
        ->join('tratamiento','tratamiento.id','=','ds.id')
        ->join('cita','cita.id','=','ds.cita_id')
        ->select('servicio.id as id_s','tratamiento.costo as tc','tratamiento.nombre as name')
        ->get();


        return view('pagos.create',compact('persona','servicio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $plan=new PlanPago();
        $plan->paciente_id=$request->input('id_pa');
        $plan->monto_total=array_sum($request->get('costos'));
        $plan->save();
        $plan->plans()->sync($request->get('servicios'));

        BitacoraController::store ($request,"Plan creado");

           return redirect()->route('pagos.index')
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $plan=DB::table('plan_pago')
      ->join('paciente','paciente.id','=','plan_pago.paciente_id')
      ->join('persona','persona.id','=','paciente.id')
      ->where('persona.tipo','=','paciente')
      ->where('plan_pago.id','=',$id)
      ->select('plan_pago.id','persona.nombre as name','plan_pago.monto_total as total')
      ->get();

      $plan1=PlanPago::find($id);

      return view('pagos.edit',compact('plan','plan1'));
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
