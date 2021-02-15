<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
//use Collective\Html\Eloquent\FormAccessible;

class Persona extends Model
{
	//use FormAccessible;

    protected $table = "persona";
    public $timestamps=false;
    protected $fillable = ['id','ci','nombre','apellido','sexo','direccion','tipo'];
    protected $primaryKey = 'id';
   
}
