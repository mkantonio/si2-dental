<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('permissions')
            ->select('id','name','display_name')
            ->get();

        return view('permissions.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $permissions = new Permission();
      $permissions ->name = $request->input('name');
      $permissions ->display_name = $request->input('display_name');
      $permissions ->save();

 BitacoraController::store ($request,"Nuevo Permiso creado");
        return redirect()->route('permissions.index')
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $ocupacion=Permission::find($id);
      return view('permissions.edit',compact('ocupacion'));
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
      $permissions = Permission::find($id);
      $permissions ->name = $request->input('name');
      $permissions ->display_name = $request->input('display_name');
      $permissions ->save();

       BitacoraController::store ($request,"Permiso Modificado");

        return redirect()->route('permissions.index')
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
      DB::table('permissions')
          ->where('permissions.id','=',$id)
          ->delete();

           BitacoraController::store ($request,"Permiso Eliminado");
      return redirect()->route('permissions.index')
      ->with('success','Permiso Eliminado con exito');
    }
}
