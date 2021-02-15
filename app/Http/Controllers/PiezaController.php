<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use DB;
use App\Models\Persona;
use App\Models\Historial;
use App\Models\Odontograma;
use App\Models\Paciente;
use App\Models\PiezaDental;




class PiezaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $detalle=DB::table('persona as p')
        ->join('paciente','paciente.id','=','p.id')
        ->join('historial','historial.paciente_id','=','paciente.id')
        ->join('odontograma','odontograma.id','=','historial.odontograma_id')
        ->where('p.tipo','=','paciente')
        ->select('odontograma.id','p.ci','p.nombre as nombreP','p.apellido as apell')
        ->get();
        return view('piezas.index',compact('detalle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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

          $aux=DB::table('pieza_dental as pz')
          ->join('odontograma','odontograma.id','=','pz.odontograma_id')
          ->join('dientes','dientes.id','=','pz.diente_id')
          ->where('odontograma.id','=',$id)
          ->select('dientes.descripcion as des','dientes.nombre as dn')
          ->get();
        
          return view('piezas.show',compact('piezasdetalle','aux'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

       $prueba=PiezaDental::find($id);
       $pieza=DB::table('pieza_dental')
       ->where('pieza_dental.id','=',$id)
       ->pluck('pieza_dental.id')->toArray();
        return view('piezas.edit',compact('pieza','prueba'));

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
