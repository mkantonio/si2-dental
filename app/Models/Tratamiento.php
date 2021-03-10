<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
  protected $table = "tratamiento";
  protected $primaryKey = 'id';
  protected $fillable = ['Nombre','Costo','Descripcion'];
  public $timestamps = false;
}
