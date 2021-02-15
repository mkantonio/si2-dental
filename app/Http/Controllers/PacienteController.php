<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Paciente;
use App\Models\Persona;
use App\Models\Historial;
class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $personas=DB::table('paciente as pa')
         ->select('p.id','p.ci','p.nombre','p.apellido','p.sexo','p.direccion','p.tipo')
         ->join('persona as p', 'p.id' , '=', 'pa.id')
         ->where('p.tipo','=','paciente')
         ->get();

       return view('pacientes.index',compact('personas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pacientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $tipo='';
      $this->validate($request, [
          'ci' => 'required',
          'nombre' => 'required',
          'apellido' => 'required',
          'sexo' => 'required',
          'direccion' => 'required',
      ]);

      $persona = new Persona();
      $persona->ci=$request->input('ci');
      $persona ->nombre = $request->input('nombre');
      $persona ->apellido = $request->input('apellido');
      $persona ->sexo = $request->input('sexo');
      $persona ->direccion = $request->input('direccion');
      $persona ->tipo = 'niinguno';
      $persona ->save();


      if ($request->paciente){
          $paciente=new Paciente();
          $paciente->id=$persona ->id;
          
          $paciente->fecha=$request->input('fecha');
          $paciente->save();

          $persona = Persona::find($persona ->id);
          $persona->tipo='paciente';
          $persona->save();
      }

       BitacoraController::store ($request,"Registrar de Nuevo Paciente");
      return redirect()->route('pacientes.index')
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

      $persona = Persona::find($id);
      return view('pacientes.show',compact('persona'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $persona = Persona::find($id);
      $paciente=Paciente::find($id);
      return view('pacientes.edit',compact('persona','Paciente'));
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
      $persona = Persona::find($id);
      $persona->ci=$request->input('ci');
      $persona ->nombre = $request->input('nombre');
      $persona ->apellido = $request->input('apellido');
      $persona ->sexo = $request->input('sexo');
      $persona ->direccion = $request->input('direccion');
      $persona ->save();

 BitacoraController::store ($request,"Modifiacion de datos Paciente");

      return redirect()->route('pacientes.index')
      ->with('success','Funcion completada existosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
      DB::table("Persona")->where('id',$id)->delete();
      DB::table("Paciente")->where('id',$id)->delete();

       BitacoraController::store ($request,"Paciente Eliminado");
      return redirect()->route('pacientes.index')
          ->with('success','Proceso realizado con exito');
    }
}
