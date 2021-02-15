<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanPago extends Model
{
  protected $table = "plan_pago";
  public $timestamps=false;
  protected $fillable = ['id','monto_total','paciente_id','servicio_id'];
  protected $primaryKey = 'id';

  public function plans(){
   return $this->belongsToMany(DetallePlan::class,'detalle_plan','plan_id','servicio_id');
  }
}
