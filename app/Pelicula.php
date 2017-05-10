<?php

namespace cineLaravel;

use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
  protected $table      = 'pelicula'; //referencia a la tabla
  protected $primaryKey = 'pelicula_id'; //atributo primary key
  public $timestamps    = false; //no se harán columnas de actualizado de laravel

  // campos que recibirán un valor
  // nombres que se asignarán al modelo
  protected $fillable = [
    'titulo',
    'descripcion',
    'f_lanzamiento',
    'lenguaje',
    'duracion',
    'poster',
  ];

  // se especifican campos que no se quieren asignar al modelo
  protected $guarded = [];

}
