<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
        //la tabla a conectar a este modelo
        protected $table="regions";
        //la clave primaria de esa tabla 
        protected $primaryKey ="region_id";
    
        //omitir campos de auditoria
        public $timestamps=false;
    use HasFactory;

    //relacion entre regiones y continentes 
    public function continente()
    {
        //belogsTo:parametros
        //1- el modelo a relacionar
        //2- la FK del modelo a relacionar em el modelo actual
        return $this->belongsTo(continent::class ,
                          'continent_id');
    }

    //
    public function paises(){
        return $this->hasMany(Country::class,
                                'region_id');
    }
}
