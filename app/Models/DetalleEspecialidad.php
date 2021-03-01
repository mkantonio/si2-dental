<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleEspecialidad extends Model
{
  protected $table = "detalle_especialidad";
  public $timestamps=false;
  protected $fillable = ['IdOdontologo','IdEspecialidad'];
  protected $primaryKey = 'id';



  public static function insert($idOdontologo, $idEspecialida){
    DetalleEspecialidad::create(array(
      "IdOdontologo"=> $idOdontologo,
      "IdEspecialidad"=> $idEspecialida
    ));
  }
}
