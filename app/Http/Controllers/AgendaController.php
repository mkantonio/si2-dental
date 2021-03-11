<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Agenda;
use App\Models\Persona;
use App\Models\Paciente;
use App\Models\Odontologo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;




class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $agendas = Agenda::with('odontologo')->get();
       return view('agendas.index',compact('agendas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $odontologos = Odontologo::with('persona')->get();
        return view('agendas.create', compact('odontologos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'Fecha' => 'required',
            'Hora' => 'required',
            'Disponibilidad' => 'required',
            'odontologo' => 'required',
          ]);

          $agenda = new Agenda();
          $agenda->Fecha = $request->Fecha;
          $agenda->Hora = $request->Hora;
          $agenda->Disponibilidad = $request->Disponibilidad;
          $agenda->IdOdontol = $request->odontologo;
          $agenda->save();
  
          BitacoraController::store($request, "Datos de la Agenda Modificadados");
          return redirect()->route('agendas.index')
              ->with('success', 'Funcion completada existosamente');
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agenda = Agenda::find($id)->with('odontologo')->first();
        return view('agendas.show', compact('agenda'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agenda = Agenda::find($id)->with('odontologo')->first();
        return view('agendas.edit', compact('agenda'));
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
        $agenda = Agenda::find($id)->with('odontologo')->first();
        $agenda->Fecha = $request->Fecha;
        $agenda->Hora = $request->Hora;
        $agenda->Disponibilidad = $request->Disponibilidad;
        $agenda->IdOdontol = $agenda->odontologo->id;
        $agenda->save();

        BitacoraController::store($request, "Datos de la Agenda Modificadados");
        return redirect()->route('agendas.index')
            ->with('success', 'Funcion completada existosamente');

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
