<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
  protected $table = "servicio";
  public $timestamps=false;
  protected $fillable = ['id','servicio_id','tratamiento_id','cita_id','odontologo_id'];
  protected $primaryKey = 'id';
}
