<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Cita;
use App\Models\Paciente;
use App\Models\Persona;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $citas=DB::table('cita')
      ->join('paciente','cita.id_paciente','=','paciente.id')
      ->join('persona','paciente.id','=','persona.id')
      ->where('persona.tipo','=','paciente')
      ->select('cita.id','cita.hora','cita.fecha','persona.nombre as nombreP','persona.apellido as apell')
      ->get();
       return view('citas.index',compact('citas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $personas=DB::table('paciente as pa')
         ->select('p.id','p.ci','p.nombre','p.apellido','p.sexo','p.direccion','p.tipo')
         ->join('persona as p', 'p.id' , '=', 'pa.id')
         ->where('p.tipo','=','paciente')
         ->get();
        return view('citas.create',compact('personas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $citas = new Cita();
      $citas->hora=$request->input('hora');
      $citas ->fecha = $request->input('fecha');
      $citas ->agenda_id = $request->input('agenda_id');
      $citas ->id_paciente = $request->input('id');
      $citas ->descripcion = $request->input('descripcion');
      $citas ->save();

        BitacoraController::store ($request,"Nueva Cita Registrada");

      return redirect()->route('citas.index')
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
      $personas=DB::table('persona as p')
         ->select('p.id','p.nombre','p.apellido')
         ->join('paciente','paciente.id','=','p.id')
         ->join('cita','cita.id_paciente','=','paciente.id')
         ->where('cita.id','=',$id)
         ->get();
        $cita = Cita::find($id);
      return view('citas.show',compact('cita','personas'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $personas=DB::table('persona as p')
         ->select('p.id','p.nombre')
         ->join('paciente','paciente.id','=','p.id')
         ->join('cita','cita.id_paciente','=','paciente.id')
         ->where('cita.id','=',$id)
         ->get();
      $cita = Cita::find($id);
      return view('citas.edit',compact('cita','personas'));
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
      $citas->hora=$request->input('hora');
      $citas ->fecha = $request->input('fecha');
      $citas ->agenda_id = $request->input('agenda_id');
      $citas ->id_paciente = $request->input('id');
      $citas ->descripcion = $request->input('descripcion');
      $citas ->save();

  BitacoraController::store ($request,"Cita Reprogramada");

      return redirect()->route('citas.index')
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
        //
    }
}
