<?php

namespace App\Http\Controllers;


use App\Models\Persona;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Odontologo;
use App\Models\Role;
//use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->get();
//        $data = DB::table('users')
//            ->join('role_user','users.id','=','role_user.user_id')
//            ->join('roles','role_user.role_id','=','roles.id')
//            ->select('users.name','users.email','users.id','roles.name as nombrerole')
//            ->get();/

        return view('users.index',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
//        dd($roles);
//        die();
        $odontologos=DB::table('persona as p')
            ->join('odontologo as e', 'p.id' , '=', 'e.id')
            ->select('p.nombre','p.apellido','e.email')
            ->get();

      $recepcionistas=DB::table('persona as p')
                ->join('recepcionista as e', 'p.id' , '=', 'e.id')
                ->select('p.nombre','p.apellido','e.email')
                ->get();
//        dd($personas);
        return view('users.create',compact('roles','odontologos','recepcionistas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param\Illuminate\Http\Request  $request
     * @return\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);


        $user = User::create($input);
        foreach ($request->input('roles') as $key => $value) {
            $user->attachRole($value);
        }
        $user->save();
 BitacoraController::store ($request,"Nuevo Usuario");
        return redirect()->route('users.index')
            ->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles =  Role::all();
        $userRole = $user->getRoleNames();
        return view('users.edit',compact('user','roles','userRole'));
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
//        if(!empty($input['password'])){
//            $input['password'] = Hash::make($input['password']);
//        }else{
//            $input = array_except($input,array('password'));
//        }

        $user = User::find($id);
        $user->update($input);
        $user->save();
        //DB::table('role_user')->where('user_id',$id)->delete();


//        foreach ($request->input('roles') as $key => $value) {
//            $user->attachRole($value);
//        }
         BitacoraController::store ($request,"Usuario Modificado");
        return redirect()->route('users.index')
            ->with('success','User actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        User::find($id)->delete();
         BitacoraController::store ($request,"Usuario Eliminado");
        return redirect()->route('users.index')
            ->with('success','User deleted successfully');
    }
}
