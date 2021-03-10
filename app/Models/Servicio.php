<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
  protected $table = "servicio";
  protected $primaryKey = 'id';
  protected $fillable = ['Tipo', 'Detalle'];
  public $timestamps = false;
}
