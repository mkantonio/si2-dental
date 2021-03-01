<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\Odontologo;
use Illuminate\Support\Facades\DB;
use App\Models\Especialidad;
use App\Models\DetalleEspecialidad;
use App\Models\Bitacora;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\OdontologoStoreRequest;

class OdontologoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        // $personas=DB::table('odontologo as o')
        //   ->select('p.id','p.ci','p.nombre','p.apellido','p.sexo','p.direccion','p.tipo')
        //   ->join('persona as p', 'p.id' , '=', 'o.id')
        //   ->where('p.tipo','=','odontologo')
        //   ->get();
        $odontologos = Odontologo::all();


        return view('odontologos.index', compact('odontologos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $especialidades = Especialidad::all();
        return view('odontologos.create', compact('especialidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(OdontologoStoreRequest $request, Persona $persona)
    {
        if (!$request->odontologo) {
            return redirect()->route('odontologos.create')
                ->with('error', 'Debe especificar que es un odontologo');
        }

        $persona = Persona::create([
            'CI' => $request->input('CI'),
            'Nombre' => $request->input('Nombre'),
            'Apellido' => $request->input('Apellido'),
            'Sexo' => $request->input('Sexo'),
            'Direccion' => $request->input('Direccion'),
            'TipoP' => $request->input('odontologo'),
        ]);

        $odontologo = Odontologo::create([
            'Correo' => $request->input('email'),
            'TipoP' => $persona->id,
        ]);
        $especialidadesArray = $request->especialidades;
        foreach ($especialidadesArray as $especialidad) {
            $detalle_especialidad = new DetalleEspecialidad();
            $detalle_especialidad->IdOdontologo = $odontologo->id;
            $detalle_especialidad->IdEspecialidad = $especialidad;
            $detalle_especialidad->save();
        }

        BitacoraController::store($request, "Registrar de Nuevo Odontologo");

        return redirect()->route('odontologos.index')
            ->with('success', 'Funcion completada existosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $odontologo = Odontologo::find($id);
        return view('odontologos.show', compact('odontologo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $odontologo = Odontologo::find($id);
        return view('odontologos.edit', compact('odontologo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $odontologo = Odontologo::find($id);
        $odontologo->persona->CI = $request->ci;
        $odontologo->persona->Nombre = $request->nombre;
        $odontologo->persona->Apellido = $request->apellido;
        $odontologo->persona->Sexo = $request->sexo;
        $odontologo->persona->Direccion = $request->direccion;
        $odontologo->persona->save();
        $odontologo->save();

        BitacoraController::store($request, "Datos del Odontologo Modificadados");

        return redirect()->route('odontologos.index')
            ->with('success', 'Funcion completada existosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        $odontologo = Odontologo::find($id);
        $persona = Persona::find($odontologo->persona->id)->delete();
        $odontologo->delete();
        DB::table("detalle_especialidad")->where('IdOdontologo', $id)->delete();

        BitacoraController::store($request, "Se Elimino un Odontologo");
        return redirect()->route('odontologos.index')
            ->with('success', 'Proceso realizado con exito');
    }
}
