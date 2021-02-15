<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;
class Cita extends Model
{
  protected $table = "cita";
  public $timestamps=false;
  protected $fillable = ['id','hora','fecha','descripcion','agenda_id','id_paciente'];
  protected $primaryKey = 'id';

  use FormAccessible;
    public function getDateOfBirthAttribute($value)
    {
        return Carbon::parse($value)->format('m/d/Y');
    }
     public function formDateOfBirthAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }

    public function detalle(){
     return $this->hasMany(DetalleCita::class);
    }

}
