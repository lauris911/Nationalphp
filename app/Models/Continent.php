<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Continent extends Model
{
    //la tabla a conectar a este modelo
    protected $table="continents";
    //la clave primaria de esa tabla 
    protected $primaryKey ="continent_id";

    //omitir campos de auditoria
    public $timestamps=false;

    use HasFactory;

    //Relacionn entre continente y region

    public function regiones(){
        //hasMany parametros
        //1. el modelo a relacionar 
        //2.la FK del model actual en el modelo a relacionar  
        return $this->hasMany(Region::class,
                  'continent_id');
    }
    //relaccion entre continente y sus paises
    //Abuelo: Continent
    //Papa: Region
    //Nieto: Country
    
    public function paises(){
        //hasManyThrough parametros
        //1-modelo nieto
        //2-modelo papa
        //3-FK del abuelo en el papa
        //4-Fk del papa en el nieto
        return $this->hasManyThrough(Country::Class,
                                     Region::class,
                                       'continent_id' ,
                                       'region_id');
    }

}
