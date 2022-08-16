<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
        //la tabla a conectar a este modelo
        protected $table="countries";
        //la clave primaria de esa tabla 
        protected $primaryKey ="country_id";
    
        //omitir campos de auditoria
        public $timestamps=false;
    
    use HasFactory;

    //relacion m:m entre paises e idiomas 
    public function idiomas(){
        //1-modelo arelacionar
        //2-la tabla pivote
        //3-FK del modelo actual del pivote 
        //4-FKdel modelo relacionar del pivote
        return $this->belongsToMany(Idioma::class,
                              'country_languages', 
                              'country_id',
                              'language_id'

                            )->withPivot('official');
    }
  public function Region (){
    return $this->belongsTo(Region::class , 'region_id');

    
  }
}
