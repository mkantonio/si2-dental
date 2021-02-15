<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
  protected $table = "servicio";
  public $timestamps=false;
  protected $fillable = ['id','nombre','costo','descripcion'];
  protected $primaryKey = 'id';
}
