<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detalle_Anamnesis extends Model
{
  protected $table = "detalle_anamnesis";
  protected $primaryKey = 'id';
  protected $fillable = ['IdAnamnesis','IdPadecimiento'];
  public $timestamps = false;


}
