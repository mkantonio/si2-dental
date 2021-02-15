<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Odontologo;
use App\Models\Paciente;
use App\Models\Recepcionista;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Models\Persona;
use DB;


class PersonaController extends Controller
{
     public function index(Request $request)
    {

        $personas = Persona::orderBy('id','DESC')->get();
        return view('personas.index',compact('personas'));

    }
    public function create()
    {
        return view('personas.create');
    }
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

        if ($request->recepcionista){
            $recepcionista=new Recepcionista();
            $recepcionista->id=$persona ->id;
            $recepcionista->email=$request->input('email2');
            $recepcionista->save();

            $persona = Persona::find($persona ->id);
            $persona->tipo='recepcionista';
            $persona->save();
        }
        if ($request->paciente){
            $paciente=new Paciente();
            $paciente->id=$persona ->id;
            $paciente->fecha=$request->input('fecha');
            $paciente->save();

            $persona = Persona::find($persona ->id);
            $persona->tipo='paciente';
            $persona->save();
        }

        BitacoraController::store ($request,"Registrar nueva Persona");

        return redirect()->route('personas.index')
            ->with('success','Persona registrada satisfactoriamente');
    }

    public function show($id)
    {
        $persona = Persona::find($id);

        return view('personas.show',compact('persona'));
    }
    public function edit($id)
        {
        $persona = Persona::find($id);
      return view('recepcionistas.edit',compact('persona','recepcionista'));
        }

    public function update(Request $request, $id)
    {
      $persona = Persona::find($id);
      $persona->ci=$request->input('ci');
      $persona ->nombre = $request->input('nombre');
      $persona ->apellido = $request->input('apellido');
      $persona ->sexo = $request->input('sexo');
      $persona ->direccion = $request->input('direccion');
      $persona ->save();


      return redirect()->route('recepcionistas.index')
      ->with('success','Funcion completada existosamente');




    }
    public function destroy($id)
    {
        DB::table("persona")->where('id',$id)->delete();
        return redirect()->route('personas.index')
            ->with('success','Persona deleted successfully');
    }
}
