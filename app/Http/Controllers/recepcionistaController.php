<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\Recepcionista;
use DB;

class recepcionistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $personas=DB::table('recepcionista as r')
          ->select('p.id','p.ci','p.nombre','p.apellido','p.sexo','p.direccion','p.tipo')
          ->join('persona as p', 'p.id' , '=', 'r.id')
          ->where('p.tipo','=','recepcionista')
          ->get();

      return view('recepcionistas.index',compact('personas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recepcionistas.create');
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


      if ($request->recepcionista){

          $recepcionista=new Recepcionista();
          $recepcionista->id=$persona ->id;
          $recepcionista->email=$request->input('email2');
          $recepcionista->save();

          $persona = Persona::find($persona ->id);
          $persona->tipo='recepcionista';
          $persona->save();

      }

       BitacoraController::store ($request,"Registrar de Nueva Recepcionista");
      return redirect()->route('recepcionistas.index')
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
      $recepcionista=Recepcionista::find($id);
      return view('recepcionistas.show',compact('persona','recepcionista'));
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
      $recepcionista=Recepcionista::find($id);
      return view('recepcionistas.edit',compact('persona','recepcionista'));
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

 BitacoraController::store ($request,"Datos modificados Recepcionista");
      return redirect()->route('recepcionistas.index')
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
      DB::table("Recepcionista")->where('id',$id)->delete();
       BitacoraController::store ($request,"Eliminacion de Recepcionista");
      return redirect()->route('recepcionistas.index')
          ->with('success','Proceso realizado con exito');
    }
}
