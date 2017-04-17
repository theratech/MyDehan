<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
	protected $fillable = ['sc_motivo', 'sc_observacion', 'sc_fecha'];

	public $primaryKey  = 'sc_id';

    protected $table = 'seguimiento_colegios';

    public function colegio(){
    	return $this->hasOne('App\Colegio', 'col_id', 'sc_colegio');
    }
    public function usuario(){
    	return $this->hasOne('App\Usuario', 'u_id', 'sc_user');
    }
}
