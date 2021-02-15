<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleEspecialidad extends Model
{
  protected $table = "detalle_especialidad";
  public $timestamps=false;
  protected $fillable = ['id','odontologo_id','especialidad_id'];
  protected $primaryKey = 'id';



  public static function insert($idOdontologo, $idEspecialida){
    DetalleEspecialidad::create(array(
      "odontologo_id"=> $idOdontologo,
      "especialidad_id"=> $idEspecialida
    ));
  }
}
