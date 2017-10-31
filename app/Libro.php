<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    //
    public function nivel(){
    	return $this->belongsTo('App\Nivel','l_nivel','n_id');
    }
}
