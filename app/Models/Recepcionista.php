<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;

class Recepcionista extends Model
{
  protected $table = "recepcionista";
  public $timestamps=false;
  protected $fillable = ['id','email'];
  protected $primaryKey = 'id';
}
