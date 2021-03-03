<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
  protected $table = "historial";
  protected $primaryKey = 'id';
  protected $fillable = ['IdPaciente', 'IdAnamnesis', 'IdOdontograma'];
  public $timestamps = false;



  public function padecimientos()
  {
    return $this->belongsToMany(Anamnesis::class, Padecimiento::class, 'detalle_anamnesis', 'anamnesis_id', 'padecimiento_id');
  }

  public function paciente(){
    return $this->belongsTo(Paciente::class, 'IdPaciente', 'id');
  }
}
