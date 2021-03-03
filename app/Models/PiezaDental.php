<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PiezaDental extends Model
{
  protected $table = "piezadental";
  protected $primaryKey = 'id';
  protected $fillable = ['IdOdontograma','IdDiente','Estado'];
  public $timestamps = false;
}
