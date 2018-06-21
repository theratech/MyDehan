<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Excuse extends Model
{
    protected $fillable = [
    	"user_id", "excuse"
    ];
}
