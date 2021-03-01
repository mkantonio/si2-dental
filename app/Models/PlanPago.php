<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanPago extends Model
{
  protected $table = "plan_pago";
  public $timestamps=false;
  protected $fillable = ['id','monto_total','paciente_id','IdServicio'];
  protected $primaryKey = 'id';

  public function plans(){
   return $this->belongsToMany(DetallePlan::class,'detalle_plan','plan_id','IdServicio');
  }
}
