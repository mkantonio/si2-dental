<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\Persona;


class Recepcionista extends Model
{
  protected $table = "recepcionista";
  protected $primaryKey = 'id';
  protected $fillable = ['Correo', 'TipoP'];
  public $timestamps = false;

  public function persona()
  {
    return $this->belongsTo(Persona::class, 'TipoP', 'id');
  }

  public function nuevaRecepcionista($request, Persona $persona){
    $this->Correo = $request->input('Correo');
    $this->TipoP = $persona->id;
    $this->save();
    return $this;
  }
}
