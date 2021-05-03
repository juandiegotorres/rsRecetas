<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    //Campos que se agregaran
    protected $fillable = [
        'titulo', 'ingredientes', 'preparacion', 'imagen', 'categoria_id'
    ];

    //Obtiene la categoria de la receta con clave foranea
    public function categoria() 
    {
        return $this->belongsTo(CategoriaReceta::class);
    }
  
    //Obtiene la informacion del usuario con clave foranea

    public function autor() 
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}
