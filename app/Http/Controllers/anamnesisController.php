<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Anamnesis;
use App\Models\Padecimiento;
use App\Models\Historial;
class anamnesisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $aux=DB::table('anamnesis')
      ->join('historial','historial.anamnesis_id','=','anamnesis.id')
      ->join('paciente','historial.paciente_id','=','paciente.id')
      ->join('persona','paciente.id','=','persona.id')
      ->where('persona.tipo','=','paciente')
      ->select('anamnesis.id as id_a','persona.ci','persona.nombre as nombreP','persona.apellido as apell','paciente.fecha')
      ->get();

        return view('anamnesis.index',compact('aux'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
      $citas=DB::table('anamnesis')
      ->join('historial','historial.anamnesis_id','=','anamnesis.id')
      ->join('paciente','historial.paciente_id','=','paciente.id')
      ->join('persona','paciente.id','=','persona.id')
      ->where('persona.tipo','=','paciente')
      ->where('anamnesis.id','=',$id)
      ->select('historial.id','persona.ci','persona.nombre as nombreP','persona.apellido as apell','paciente.fecha',
      'persona.sexo as sex','persona.direccion as dir','anamnesis.estado as es','anamnesis.descripcion','anamnesis.pregunta1','anamnesis.pregunta2'
      ,'anamnesis.pregunta3','anamnesis.pregunta4','anamnesis.pregunta5','anamnesis.pregunta6')
      ->get();

      $enfermedades=Padecimiento::get();

      $role = DB::table('historial')
      ->join('anamnesis','anamnesis.id','=','historial.anamnesis_id')
      ->join('detalle_anamnesis','detalle_anamnesis.anamnesis_id','=','anamnesis.id')
      ->join('padecimiento','padecimiento.id','=','detalle_anamnesis.padecimiento_id')
      ->where('anamnesis.id','=',$id)
      ->pluck('detalle_anamnesis.anamnesis_id','detalle_anamnesis.padecimiento_id')->toArray();

      $role1 =DB::table("detalle_anamnesis")->where("detalle_anamnesis.anamnesis_id",$id)
      ->pluck('detalle_anamnesis.padecimiento_id','detalle_anamnesis.padecimiento_id')->toArray();


      $anamnesis=Anamnesis::find($id);
            return view('anamnesis.edit',compact('citas','enfermedades','role1','anamnesis'));
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
      $anamnesis = Anamnesis::find($id);
      $anamnesis->estado = $request->input('estado');
      $anamnesis->descripcion = $request->input('descripcion');
      $anamnesis->pregunta1 = $request->input('pregunta1');
        $anamnesis->pregunta2 = $request->input('pregunta2');
          $anamnesis->pregunta3 = $request->input('pregunta3');
            $anamnesis->pregunta4 = $request->input('pregunta4');
              $anamnesis->pregunta5 = $request->input('pregunta5');
                $anamnesis->pregunta6 = $request->input('pregunta6');
                  $anamnesis->save();
                  DB::table("detalle_anamnesis")->where("detalle_anamnesis.anamnesis_id",$id)
                      ->delete();
                          $anamnesis->padecimientos()->sync($request->get('enfermedades'));


                      BitacoraController::store ($request,"Anamnesis Modificado");
                             return redirect()->route('anamnesis.index')
                                 ->with('success','Operacion realizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
      DB::table("historial")->where('historial.anamnesis_id',$id)->delete();
      DB::table("anamnesis")->where('id',$id)->delete();
      DB::table("detalle_anamnesis")->where("detalle_anamnesis.anamnesis_id",$id)
          ->delete();

     BitacoraController::store ($request,"Se Elimino un Odontologo");
      return redirect()->route('anamnesis.index')
          ->with('success','Proceso realizado con exito');
    }
}
