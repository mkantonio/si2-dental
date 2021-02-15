<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\PiezaDental;
use App\Odontograma;
use App\diente;

class OdontogramaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  $citas=DB::table('persona as p')
      ->join('paciente','paciente.id','=','p.id')
      ->join('historial','historial.paciente_id','=','paciente.id')
      ->join('odontograma','odontograma.id','=','historial.odontograma_id')
      ->where('p.tipo','=','paciente')
      ->select('odontograma.id','p.ci','p.nombre as nombreP','p.apellido as apell')
      ->get();
        return view('odontogramas.index',compact('citas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {     $dientes=diente::get();
          return view('odontogramas.create',compact('dientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $odontograma=new Odontograma();
        $odontograma->save();

      $odontograma->diente()->sync($request->get('dientes'));

                BitacoraController::store ($request,"Odontograma Creado");

                   return redirect()->route('odontogramas.index')
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

                $aux=DB::table('pieza_dental as pz')
                ->join('odontograma','odontograma.id','=','pz.odontograma_id')
                ->join('dientes','dientes.id','=','pz.diente_id')
                ->where('odontograma.id','=',$id)
                ->select('dientes.descripcion as des','dientes.nombre as dn')
                ->get();

                return view('odontogramas.show',compact('aux'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $odontograma=Odontograma::find($id);
        $diente=diente::get();
        $piezadental=DB::table('pieza_dental')->where("pieza_dental.odontograma_id",$id)
        ->pluck('pieza_dental.diente_id','pieza_dental.diente_id')->toArray();
        return view('odontogramas.edit',compact('odontograma','diente','piezadental'));
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
        $odontograma=Odontograma::find($id);
        $odontograma->save();
        DB::table("pieza_dental")->where("pieza_dental.odontograma_id",$id)
            ->delete();
            $odontograma->diente()->sync($request->get('dientes'));

                      BitacoraController::store ($request,"Odontograma Creado");

                         return redirect()->route('odontogramas.index')
                         ->with('warning','Funcion completada existosamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {

      DB::table("odontograma")->where('id',$id)->delete();
      DB::table("pieza_dental")->where("pieza_dental.odontograma_id",$id)
          ->delete();

     BitacoraController::store ($request,"Se Elimino un Odontograma");
      return redirect()->route('odontogramas.index')
          ->with('success','Proceso realizado con exito');
    }
}
