<?php

 namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class Especialidad extends Model
{
  protected $table = "especialidad";
  public $timestamps=false;
  protected $fillable = ['id','nombre','descripcion'];
  protected $primaryKey = 'id';
    
}
