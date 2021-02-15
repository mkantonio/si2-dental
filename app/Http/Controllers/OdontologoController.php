<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use App\Odontologo;
use DB;
use App\Especialidad;
use App\DetalleEspecialidad;
use App\Bitacora;
 use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

class OdontologoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $personas=DB::table('odontologo as o')
          ->select('p.id','p.ci','p.nombre','p.apellido','p.sexo','p.direccion','p.tipo')
          ->join('persona as p', 'p.id' , '=', 'o.id')
          ->where('p.tipo','=','odontologo')
          ->get();

      return view('odontologos.index',compact('personas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $especialidades=Especialidad::get();
          return view('odontologos.create',compact('especialidades'));
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


      if ($request->odontologo){

          $odontologo=new Odontologo();
          $odontologo->id=$persona ->id;
          $odontologo->email=$request->input('email');
          $odontologo->save();

          $persona = Persona::find($persona ->id);
          $persona->tipo='odontologo';
          $persona->save();

      }
  $odontologo->especialidad()->sync($request->get('especialidades'));

   BitacoraController::store ($request,"Registrar de Nuevo Odontologo");

      return redirect()->route('odontologos.index')
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
      $odontologo=Odontologo::find($id);
      return view('odontologos.show',compact('persona','odontologo'));
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
      $odontologo=Odontologo::find($id);
      return view('odontologos.edit',compact('persona','odontologo'));
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

 BitacoraController::store ($request,"Datos del Odontologo Modificadados");

      return redirect()->route('odontologos.index')
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
      DB::table("Odontologo")->where('id',$id)->delete();

      DB::table("detalle_especialidad")->where('odontologo_id',$id)->delete();

     BitacoraController::store ($request,"Se Elimino un Odontologo");
      return redirect()->route('odontologos.index')
          ->with('success','Proceso realizado con exito');
    }
}
