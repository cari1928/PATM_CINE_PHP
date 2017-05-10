<?php

namespace cineLaravel;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
  protected $table      = 'sucursal'; //referencia a la tabla
  protected $primaryKey = 'sucursal_id'; //atributo primary key
  public $timestamps    = false; //no se harán columnas de actualizado de laravel

  // campos que recibirán un valor
  // nombres que se asignarán al modelo
  protected $fillable = [
    'pais',
    'ciudad',
    'direccion',
    'latitud',
    'longitud',
  ];

  // se especifican campos que no se quieren asignar al modelo
  protected $guarded = [];
}
