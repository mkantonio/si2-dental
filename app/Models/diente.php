<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class diente extends Model
{
  protected $table = "dientes";
  public $timestamps=false;
  protected $fillable = ['id','nombre','descripcion'];
  protected $primaryKey = 'id';
}
