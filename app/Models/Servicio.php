<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
  protected $table = "servicio";
  public $timestamps=false;
  protected $fillable = ['id','IdServicio','idTratamiento','IdCita','IdOdontologo'];
  protected $primaryKey = 'id';
}
