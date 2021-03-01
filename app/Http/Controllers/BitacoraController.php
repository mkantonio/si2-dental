<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Bitacora;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;

class BitacoraController extends Controller
{
    public function index()
    {
        $bitacoras = Bitacora::all();
        return view('bitacoras.index',compact('bitacoras'));

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function store($request,$accion)
    {
        $user=Auth::user();

        $bitacora=new Bitacora();
        $bitacora->user=$user->name;
        $bitacora->email=$user->email;
        $bitacora->fecha=date('Y-m-d');
        $bitacora->hora = date('H:m:s');
        $bitacora->accion=$accion;
        $bitacora->navegador = $request->header('User-Agent');
        $bitacora->ip = $request->ip();
        $bitacora->url = $request->fullUrl();
        $bitacora->save();


    }





}
