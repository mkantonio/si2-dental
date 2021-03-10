<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Agenda extends Model
{
  protected $table = "agenda";
  protected $primaryKey = 'id';
  protected $fillable = ['IdOdontol','Fecha', 'Hora', 'Disponibilidad'];
  public $timestamps = false;

  
  public function odontologo(){
    return $this->belongsTo(Odontologo::class, 'IdOdontol', 'id');
  }

  public static function agendaLibreOdontologo(){
    return Agenda::where('Disponibilidad', '=', 'Disponible')->with('odontologo')->get();
  }
}
