<?php

namespace cineLaravel;

use Illuminate\Database\Eloquent\Model;

class Privilegio extends Model
{
  protected $table      = 'privilegio'; //referencia a la tabla
  protected $primaryKey = 'privilegio_id'; //atributo primary key
  public $timestamps    = false; //no se harán columnas de actualizado de laravel

  // campos que recibirán un valor
  // nombres que se asignarán al modelo
  protected $fillable = [
    'persona_id',
    'privilegio_id',
  ];

  // se especifican campos que no se quieren asignar al modelo
  protected $guarded = [];
}
