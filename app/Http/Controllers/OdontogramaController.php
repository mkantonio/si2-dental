<?php

namespace App\Http\Controllers;

use App\Models\diente;
use App\Models\Odontograma;
use App\Models\Persona;
use App\Models\PiezaDental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OdontogramaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $citas = Persona::where('TipoP', 'Paciente')->with('paciente')->get();

        $citas = DB::table('persona as p')
        ->join('paciente', 'paciente.TipoP', '=', 'p.id')
        ->join('historial', 'historial.IdPaciente', '=', 'paciente.id')
        ->join('odontograma', 'odontograma.id', '=', 'historial.IdOdontograma')
        ->where('p.TipoP', '=', 'Paciente')
        ->select('odontograma.id', 'p.CI', 'p.Nombre as nombreP', 'p.Apellido as apell')
        ->get();
        // dd($citas);
        return view('odontogramas.index', compact('citas'));
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

                $aux=DB::table('piezadental as pz')
                ->join('odontograma','odontograma.id','=','pz.IdOdontograma')
                ->join('diente','diente.id','=','pz.IdDiente')
                ->where('odontograma.id','=',$id)
                ->select('diente.descripcion as des','diente.nombre as dn')
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
        $piezadental=DB::table('piezadental')->where("piezadental.IdOdontograma",$id)
        ->pluck('piezadental.IdDiente','piezadental.IdDiente')->toArray();
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
        DB::table("piezadental")->where("piezadental.odontograma_id",$id)
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
      DB::table("piezadental")->where("piezadental.odontograma_id",$id)
          ->delete();

     BitacoraController::store ($request,"Se Elimino un Odontograma");
      return redirect()->route('odontogramas.index')
          ->with('success','Proceso realizado con exito');
    }
}
