<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuariosColegios extends Model
{
    protected $table = 'usuarios_instituciones';

    public function colegio(){
    	return $this->hasOne('App\Colegio','col_id','ui_institucion');
    }
}
