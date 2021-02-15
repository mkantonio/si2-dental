<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    protected $table = "Bitacora";
    protected $fillable = ['id','user','accion','fecha','hora', 'email', 'navegador', 'url'];
    public $timestamps=false;
    protected $primaryKey = 'id';

}
