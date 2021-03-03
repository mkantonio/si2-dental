<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anamnesis extends Model
{
  protected $table = "anamnesis";
  protected $primaryKey = 'id';
  protected $fillable = ['Estado', 'Descripcion', 'Pregunta1', 'Pregunta2', 'Pregunta3', 'Pregunta4', 'Pregunta5'];
  public $timestamps = false;



  public function padecimientos()
  {
    return $this->belongsToMany(Padecimiento::class, 'detalle_anamnesis', 'IdAnamnesis', 'IdPadecimiento');
  }
}
