<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlumnosLibros extends Model
{
    protected $table = 'alumnos_libros';

    public function info(){
    	return $this->hasOne('App\Libro','l_id','al_libro_actual');
    }
}
