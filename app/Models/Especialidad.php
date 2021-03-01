<?php

 namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class Especialidad extends Model
{
  protected $table = "especialidad";
  public $timestamps=false;
  protected $fillable = ['id', 'IdOdontologo', 'IdEspecialidad'];
  protected $primaryKey = 'id';

  public function especialidad(){
    return $this->belongsToMany(Especialidad::class,'detalle_especialidad', 'IdEspecialidad', 'IdOdontologo');
  }
    
}
