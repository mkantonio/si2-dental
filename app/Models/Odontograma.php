<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Odontograma extends Model
{
  protected $table = "odontograma";
  public $timestamps=false;
  protected $fillable = ['id','descripcion'];
  protected $primaryKey = 'id';

  public function diente(){
   return $this->belongsToMany(PiezaDental::class,'pieza_dental','odontograma_id','diente_id');
  }

}
