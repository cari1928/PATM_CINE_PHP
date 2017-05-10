<?php

namespace cineLaravel;

use Illuminate\Database\Eloquent\Model;

class CategoriaPelicula extends Model
{
  protected $table      = 'categoria_pelicula'; //referencia a la tabla
  protected $primaryKey = 'categoria_pelicula_id'; //atributo primary key
  public $timestamps    = false; //no se harán columnas de actualizado de laravel

  // campos que recibirán un valor
  // nombres que se asignarán al modelo
  protected $fillable = [
    'categoria_id',
    'pelicula_id',
  ];

  // se especifican campos que no se quieren asignar al modelo
  protected $guarded = [];
}
