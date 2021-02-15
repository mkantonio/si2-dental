<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anamnesis extends Model
{
  protected $table = "anamnesis";
  public $timestamps=false;
  protected $fillable = ['id','estado','descripcion','pregunta1','pregunta2','pregunta3','pregunta4','pregunta5','pregunta6'];
  protected $primaryKey = 'id';



  public function padecimientos(){
   return $this->belongsToMany(Padecimiento::class,'detalle_anamnesis','anamnesis_id','padecimiento_id');
  }



}
