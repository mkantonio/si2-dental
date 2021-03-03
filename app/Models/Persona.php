<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
//use Collective\Html\Eloquent\FormAccessible;
use App\Models\Odontologo;
use App\Models\Recepcionista;

class Persona extends Model
{
    protected $table = "persona";
    public $timestamps = false;
    protected $fillable = ['CI', 'Nombre', 'Apellido', 'Sexo', 'Direccion', 'TipoP'];
    protected $primaryKey = 'id';

    public function odontologo()
    {
        return $this->hasOne(Odontologo::class, 'TipoP', 'id');
    }

    public function recepcionista()
    {
        return $this->hasOne(Recepcionista::class, 'TipoP', 'id');
    }

    public function paciente()
    {
        return $this->hasOne(Paciente::class, 'TipoP', 'id');
    }

    public function nuevaRecepcionista($request)
    {
        $this->CI = $request->input('CI');
        $this->Nombre = $request->input('Nombre');
        $this->Apellido = $request->input('Apellido');
        $this->Sexo = $request->input('Sexo');
        $this->Direccion = $request->input('Direccion');
        $this->TipoP = 'Recepcionista';
        $this->save();
        return $this;
    }
}
