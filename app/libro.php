<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class libro extends Model
{
    protected $fillable = [
    	'nombre',
    	'editorial_id',
    	'tipo_id',
    	'pais_id',
    	'autor_id'
    ];
}
