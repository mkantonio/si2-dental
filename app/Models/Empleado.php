<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;

class Empleado extends Model
{
	use FormAccessible;

    protected $table = "empleado";
    public $timestamps=false;
    protected $fillable = ['id','email'];
    protected $primaryKey = 'id';
   
}
