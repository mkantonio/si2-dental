<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Paciente;
use App\Models\Historial;
use App\Models\Odontograma;
use App\Models\PiezaDental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;




class PiezaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detalle = DB::table('persona as p')
            ->join('paciente', 'paciente.TipoP', '=', 'p.id')
            ->join('odontograma', 'odontograma.IdPaciente', '=', 'paciente.id')
            // ->join('historial','historial.IdOdontograma','=','odontograma.id')
            ->join('piezadental', 'piezadental.IdOdontograma', '=', 'odontograma.id')
            ->where('p.TipoP', '=', 'Paciente')
            ->select('odontograma.id', 'p.CI', 'p.Nombre as nombreP', 'p.Apellido as apell')
            ->groupBy('odontograma.id', 'p.CI', 'p.Nombre', 'p.Apellido')
            ->get();
        

        return view('piezas.index', compact('detalle'));
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

        $aux = DB::table('piezadental as pz')
            ->join('odontograma', 'odontograma.id', '=', 'pz.IdOdontograma')
            ->join('dientes', 'dientes.id', '=', 'pz.IdDiente')
            ->where('odontograma.id', '=', $id)
            ->select('dientes.Descripcion as des', 'dientes.Nombre as dn')
            ->get();

        return view('piezas.show', compact('piezasdetalle', 'aux'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $prueba = PiezaDental::find($id);
        $pieza = DB::table('piezadental')
            ->where('piezadental.id', '=', $id)
            ->pluck('piezadental.id')->toArray();
        return view('piezas.edit', compact('pieza', 'prueba'));
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
