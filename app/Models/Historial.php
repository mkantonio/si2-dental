<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
  protected $table = "historial";
  public $timestamps=false;
  protected $fillable = ['id','paciente_id','anamnesis_id','odontograma_id'];
  protected $primaryKey = 'id';


  
   public function padecimientos(){
   return $this->belongsToMany(Anamnesis::class,Padecimiento::class,'detalle_anamnesis','anamnesis_id','padecimiento_id');

}
}
