<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detalle_Anamnesis extends Model
{


  protected $table = "detalle_anamnesis";
  public $timestamps=false;
  protected $fillable = ['id','anamnesis_id','padecimiento_id'];
  protected $primaryKey = 'id';


}
