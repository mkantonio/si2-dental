<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
//use Collective\Html\Eloquent\FormAccessible;
use App\Models\Odontologo;

class Persona extends Model
{
	//use FormAccessible;

    protected $table = "persona";
    public $timestamps=false;
    protected $fillable = ['CI','Nombre','Apellido','Sexo','Direccion','TipoP'];
    protected $primaryKey = 'id';

    public function odontologo(){
        return $this->hasOne(Odontologo::class, 'TipoP', 'id');
    }
}
