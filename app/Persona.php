<?php

namespace cineLaravel;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
  protected $table      = 'persona'; //referencia a la tabla
  protected $primaryKey = 'persona_id'; //atributo primary key
  public $timestamps    = false; //no se harán columnas de actualizado de laravel

  // campos que recibirán un valor
  // nombres que se asignarán al modelo
  protected $fillable = [
    'nombre',
    'apellidos',
    'email',
    'username',
    'edad',
    'pass',
    'tarjeta',
  ];

  // se especifican campos que no se quieren asignar al modelo
  protected $guarded = [];
}
