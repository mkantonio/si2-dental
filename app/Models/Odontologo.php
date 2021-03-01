<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Odontologo extends Model
{
  protected $table = "odontologo";
  public $timestamps=false;
  protected $fillable = ['Correo', 'TipoP'];
  protected $primaryKey = 'id';




  public function especialidad(){
    return $this->belongsToMany(Especialidad::class,'detalle_especialidad','IdOdontologo','IdEspecialidad');
  }

  public function persona(){
    return $this->belongsTo(Persona::class, 'TipoP', 'id');
  }
}
