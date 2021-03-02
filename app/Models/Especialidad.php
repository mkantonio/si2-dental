<?php

 namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class Especialidad extends Model
{
  protected $table = "especialidad";
  protected $primaryKey = 'id';
  protected $fillable = ['Nombre', 'Descripcion'];
  public $timestamps = false;

  public function especialidad(){
    return $this->belongsToMany(Especialidad::class,'detalle_especialidad', 'IdEspecialidad', 'IdOdontologo');
  }
    
}
