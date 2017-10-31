<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AlumnosLibros;

class Usuario extends Model
{
    public function libros(){
    	return $this->hasMany('App\AlumnosLibros','al_alumno','u_id');
    }
    public function connect(){
    	return $this->hasOne('App\UsuariosColegios','ui_usuario','u_id');
    }
}
