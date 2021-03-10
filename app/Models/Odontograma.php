<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Odontograma extends Model
{
  protected $table = "odontograma";
  protected $primaryKey = 'id';
  protected $fillable = ['Descripcion', 'IdPaciente'];
  public $timestamps = false;

  public function diente()
  {
    return $this->belongsToMany(PiezaDental::class, 'piezadental', 'IdOdontograma', 'IdDiente');
  }

  // public function historial(){
  //   return $this->
  // }
}
