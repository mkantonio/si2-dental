<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PiezaDental extends Model
{
  protected $table = "pieza_dental";
  public $timestamps=false;
  protected $fillable = ['id','odontograma_id','diente_id','estado'];
  protected $primaryKey = 'id';
}
