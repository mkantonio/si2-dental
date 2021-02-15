<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Referencia extends Model
{
    protected $table = "referencia";
    protected $fillable = ['id','nombre','apellido','telefono','relacion','id_persona'];
    public $timestamps=false;
    protected $primaryKey = 'id';
}
