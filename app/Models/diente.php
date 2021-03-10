<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class diente extends Model
{
  protected $table = "diente";
  protected $primaryKey = 'id';
  protected $fillable = ['Nombre', 'Descripcion'];
  public $timestamps = false;
}
