<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuota extends Model
{
  protected $table = "cuota";
  public $timestamps=false;
  protected $fillable = ['id','monto','plan_pago_id'];
  protected $primaryKey = 'id';
}
