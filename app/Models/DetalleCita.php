<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleCita extends Model
{
  protected $table = "detalle_cita";
  public $timestamps=false;
  protected $fillable = ['id','IdCita','hora','fecha'];
  protected $primaryKey = 'id';

}
