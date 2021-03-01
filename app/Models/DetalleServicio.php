<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleServicio extends Model
{
  protected $table = "detalle_servicio";
  public $timestamps=false;
  protected $fillable = ['id','IdServicio','idTratamiento','IdCita','IdOdontologo'];
  protected $primaryKey = 'id';
}
