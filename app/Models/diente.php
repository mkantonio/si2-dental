<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class diente extends Model
{
  protected $table = "dientes";
  public $timestamps=false;
  protected $fillable = ['id','nombre','descripcion'];
  protected $primaryKey = 'id';
}
