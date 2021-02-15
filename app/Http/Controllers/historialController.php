<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Padecimiento;
use DB;
use App\Historial;
use App\Anamnesis;
use App\Persona;
class historialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $citas=DB::table('historial')
      ->join('paciente','historial.paciente_id','=','paciente.id')
      ->join('persona','paciente.id','=','persona.id')
      ->where('persona.tipo','=','paciente')
      ->select('historial.id','persona.ci','persona.nombre as nombreP','persona.apellido as apell','paciente.fecha')
      ->get();

        return view('historiales.index',compact('citas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
           $enfermedades=Padecimiento::get();
           $personas=DB::table('paciente as pa')
              ->select('p.id','p.ci','p.nombre','p.apellido','p.sexo','p.direccion','p.tipo')
              ->join('persona as p', 'p.id' , '=', 'pa.id')
              ->where('p.tipo','=','paciente')
              ->get();
          $odontogramas=DB::table('odontograma')
          ->select('odontograma.id')
          ->get();
            return view('historiales.create',compact('enfermedades','personas','odontogramas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $anamnesis=new Anamnesis();
      $anamnesis->estado=$request->input('estado');
      $anamnesis->descripcion=$request->input('descripcion');
      $anamnesis->pregunta1=$request->input('pregunta1');
        $anamnesis->pregunta2=$request->input('pregunta2');
          $anamnesis->pregunta3=$request->input('pregunta3');
            $anamnesis->pregunta4=$request->input('pregunta4');
              $anamnesis->pregunta5=$request->input('pregunta5');
                $anamnesis->pregunta6=$request->input('pregunta6');
                $anamnesis->save();
          $anamnesis->padecimientos()->sync($request->get('enfermedades'));

        $historial=new Historial();
        $historial->paciente_id=$request->input('id');
        $historial->anamnesis_id=$anamnesis->id;
        $historial->odontograma_id=$request->input('id_odonto');
        $historial->save();

        BitacoraController::store ($request,"Registrar Historial");

           return redirect()->route('historiales.index')
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

      $citas=DB::table('historial')
      ->join('paciente','paciente.id','=','historial.paciente_id')
      ->join('cita','cita.id_paciente','=','paciente.id')
      ->join('detalle_servicio','detalle_servicio.cita_id','=','cita.id')
      ->join('tratamiento','tratamiento.id','=','detalle_servicio.tratamiento_id')
      ->join('odontologo','odontologo.id','=','detalle_servicio.odontologo_id')
      ->join('persona','persona.id','=','odontologo.id')
      ->where('persona.tipo','=','odontologo')
      ->where('historial.id','=',$id)
      ->select('persona.nombre as name','tratamiento.nombre as name1','cita.id as id_cita')
      ->get();
    return view('historiales.show',compact('citas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $citas=DB::table('historial')
      ->join('paciente','historial.paciente_id','=','paciente.id')
      ->join('persona','paciente.id','=','persona.id')
      ->where('persona.tipo','=','paciente')
      ->join('anamnesis','historial.anamnesis_id','=','anamnesis.id')
      ->where('historial.id','=',$id)
      ->select('historial.id','persona.ci','persona.nombre as nombreP','persona.apellido as apell','paciente.fecha',
      'persona.sexo as sex','persona.direccion as dir','anamnesis.estado as es','anamnesis.descripcion','anamnesis.pregunta1','anamnesis.pregunta2'
      ,'anamnesis.pregunta3','anamnesis.pregunta4','anamnesis.pregunta5','anamnesis.pregunta6')
      ->get();

      $enfermedades=Padecimiento::get();

      $role = DB::table('historial')
      ->join('anamnesis','anamnesis.id','=','historial.anamnesis_id')
      ->join('detalle_anamnesis','detalle_anamnesis.anamnesis_id','=','anamnesis.id')
      ->join('padecimiento','padecimiento.id','=','detalle_anamnesis.padecimiento_id')
      ->where('historial.id','=',$id)
      ->pluck('detalle_anamnesis.anamnesis_id','detalle_anamnesis.padecimiento_id')->toArray();

      $role1 = DB::table("detalle_anamnesis as deta")
      ->join('anamnesis','anamnesis.id','=','deta.anamnesis_id')
      ->join('historial','historial.anamnesis_id','=','anamnesis.id')
      ->where('historial.id','=',$id)
      ->pluck('deta.padecimiento_id','deta.padecimiento_id')->toArray();

      $historial=Historial::find($id);
     return view('historiales.edit',compact('citas','enfermedades','role1','historial'));
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
