<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleServicio extends Model
{
  protected $table = "detalle_servicio";
  protected $primaryKey = 'id';
  protected $fillable = ['Fecha', 'Hora', 'IdOdontologo', 'IdCita', 'IdServicio','IdTratamiento', 'IdHistorial'];
  public $timestamps=false;
}
