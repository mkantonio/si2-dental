<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Padecimiento extends Model
{
  protected $table = "padecimiento";
  public $timestamps=false;
  protected $fillable = ['id','nombre','descripcion'];
  protected $primaryKey = 'id';

}
