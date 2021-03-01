<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Models\Ocupacion;
use Illuminate\Support\Facades\DB;


class OcupacionController extends Controller
{
    //
    public function index(Request $request)
    {
        $ocupaciones = Ocupacion::orderBy('id','DESC')->get();

        return view('ocupaciones.index',compact('ocupaciones'));
    }

    public function create()
    {
        return view('ocupaciones.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'descripcion' => 'required|unique:ocupacion,descripcion',
        ]);

        $ocupacion = new Ocupacion();
        $ocupacion->descripcion = $request->input('descripcion');
        $ocupacion->save();

        BitacoraController::store ($request,"Registrar nueva ocupacion");
        return redirect()->route('ocupaciones.index')
            ->with('success','Ocupacion created successfully');
    }
    public function show($id)
    {
        $ocupacion = Ocupacion::find($id);
        return view('ocupaciones.show',compact('ocupacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ocupacion = Ocupacion::find($id);
        return view('ocupaciones.edit',compact('ocupacion'));
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
        $this->validate($request, [
            'descripcion' => 'required',
        ]);

        $ocupacion = Ocupacion::find($id);
        $ocupacion->descripcion = $request->input('descripcion');
        $ocupacion->save();

        return redirect()->route('ocupaciones.index')
            ->with('success','Ocupacion updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("ocupacion")->where('id',$id)->delete();
        return redirect()->route('ocupaciones.index')
            ->with('success','Ocupacion deleted successfully');
    }


}
