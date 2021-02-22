<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class Empleado extends Model
{
	

    protected $table = "empleado";
    public $timestamps=false;
    protected $fillable = ['id','email'];
    protected $primaryKey = 'id';
   
}
