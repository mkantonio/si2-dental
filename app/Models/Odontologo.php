<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;

class Odontologo extends Model
{
  protected $table = "odontologo";
  public $timestamps=false;
  protected $fillable = ['id','email'];
  protected $primaryKey = 'id';




  public function especialidad(){
   return $this->belongsToMany(Especialidad::class,'detalle_especialidad','odontologo_id','especialidad_id');
  }
}
