<?php

namespace cineLaravel;

use Illuminate\Database\Eloquent\Model;

class Reparto extends Model
{
  protected $table      = 'reparto'; //referencia a la tabla
  protected $primaryKey = 'reparto_id'; //atributo primary key
  public $timestamps    = false; //no se harán columnas de actualizado de laravel

  // campos que recibirán un valor
  // nombres que se asignarán al modelo
  protected $fillable = [
    'colaborador_id',
    'pelicula_id',
    'puesto',
  ];

  // se especifican campos que no se quieren asignar al modelo
  protected $guarded = [];
}
