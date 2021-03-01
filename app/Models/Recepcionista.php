<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class Recepcionista extends Model
{
  protected $table = "recepcionista";
  public $timestamps=false;
  protected $fillable = ['Correo', 'TipoP'];
  protected $primaryKey = 'id';

  public function persona(){
    return $this->belongsTo(Persona::class, 'TipoP', 'id');
  }
}
