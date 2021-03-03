<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Odontograma extends Model
{
  protected $table = "odontograma";
  protected $primaryKey = 'id';
  protected $fillable = ['Descripcion'];
  public $timestamps = false;

  public function diente(){
   return $this->belongsToMany(PiezaDental::class,'pieza_dental','odontograma_id','diente_id');
  }

}
