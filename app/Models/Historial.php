<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Odontograma;

class Historial extends Model
{
  protected $table = "historial";
  protected $primaryKey = 'id';
  protected $fillable = ['IdAnamnesis', 'IdOdontograma'];
  public $timestamps = false;



  public function padecimientos()
  {
    return $this->belongsToMany(Anamnesis::class, Padecimiento::class, 'detalle_anamnesis', 'IdAnamnesis', 'IdPadecimiento');
  }

  public function odontograma()
  {
    return $this->belongsTo(Odontograma::class, 'IdOdontograma', 'id');
  }

  // public function paciente()
  // {
  //   return $this->belongsTo(Paciente::class, 'IdPaciente', 'id');
  // }
}
