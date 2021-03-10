<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Cita extends Model
{
    protected $table = "cita";
    protected $primaryKey = 'id';
    protected $fillable = ['Fecha', 'Hora', 'Descripcion', 'IdRecepcionist', 'IdAgenda', 'IdPacient'];
    public $timestamps = false;


    public function getDateOfBirthAttribute($value)
    {
        return Carbon::parse($value)->format('m/d/Y');
    }
    public function formDateOfBirthAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }

    public function detalle()
    {
        return $this->hasMany(DetalleCita::class);
    }
}
