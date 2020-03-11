<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    //
    protected $table = 'proyectos';
    protected $primaryKey ='id';
    public $timestamps = false;
    protected $fillable = [
    	'nombre_proyecto',
        'codigo_proyecto',
    	'id_plano_verde',
    	'id_plano_amarillo',
        'id_plano_blanco'
    ];
    protected $guarded = [
    ];
}
