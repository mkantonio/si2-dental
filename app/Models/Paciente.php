<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{

    protected $table = "paciente";
    protected $primaryKey = 'id';
    protected $fillable = ['Fecha', 'TipoP'];
    public $timestamps = false;

    //use FormAccessible;
    public function getDateOfBirthAttribute($value)
    {
        return Carbon::parse($value)->format('m/d/Y');
    }

    public function formDateOfBirthAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }

    public function persona(){
        return $this->belongsTo(Persona::class, 'TipoP', 'id');
    }

    // public function historial(){
    //     return $this->hasOne(Historial::class, 'IdPaciente', 'id');
    // }

    public function anamnesis(){
        return $this->hasOne(Anamnesis::class, 'IdPaciente', 'id');
    }

}
