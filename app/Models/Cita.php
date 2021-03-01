<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Cita extends Model
{
  protected $table = "cita";
  public $timestamps=false;
  protected $fillable = ['id','hora','fecha','descripcion','agenda_id','idPacient'];
  protected $primaryKey = 'id';

  
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
