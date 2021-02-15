<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;

class Paciente extends Model
{

	protected $table = "paciente";
	public $timestamps=false;
	protected $fillable = ['id','fecha_nacimiento'];
	protected $primaryKey = 'id';
 
	use FormAccessible;
    public function getDateOfBirthAttribute($value)
    {
        return Carbon::parse($value)->format('m/d/Y');
    }
     public function formDateOfBirthAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }

}
