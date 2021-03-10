<?php

namespace App\Models;

use App\Models\Paciente;
use Illuminate\Database\Eloquent\Model;

class Anamnesis extends Model
{
  protected $table = "anamnesis";
  protected $primaryKey = 'id';
  protected $fillable = ['Estado', 'Descripcion', 'Pregunta1', 'Pregunta2', 'Pregunta3', 'Pregunta4', 'Pregunta5', 'IdPaciente'];
  public $timestamps = false;



  public function padecimientos()
  {
    return $this->belongsToMany(Padecimiento::class, 'detalle_anamnesis', 'IdAnamnesis', 'IdPadecimiento');
  }

  public function paciente()
  {
    return $this->belongsTo(Paciente::class, 'IdPaciente', 'id');
  }
}
