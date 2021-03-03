<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Padecimiento extends Model
{
  protected $table = "padecimiento";
  protected $primaryKey = 'id';
  protected $fillable = ['Nombre', 'Descripcion'];
  public $timestamps = false;

  public function anamnesis(){
    return $this->belongsToMany(Anamnesis::class,'detalle_anamnesis','IdAnamnesis','IdPadecimiento');
  }

}
