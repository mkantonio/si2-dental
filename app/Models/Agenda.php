<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
  protected $table = "cita";
  public $timestamps=false;
  protected $fillable = ['id','id_odontologo','anio'];
  protected $primaryKey = 'id';
}
