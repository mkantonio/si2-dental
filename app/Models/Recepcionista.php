<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class Recepcionista extends Model
{
  protected $table = "recepcionista";
  public $timestamps=false;
  protected $fillable = ['id','email'];
  protected $primaryKey = 'id';
}
