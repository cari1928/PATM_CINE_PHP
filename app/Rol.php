<?php

namespace cineLaravel;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
  protected $table      = 'rol'; //referencia a la tabla
  protected $primaryKey = 'rol_id'; //atributo primary key
  public $timestamps    = false; //no se harán columnas de actualizado de laravel

  // campos que recibirán un valor
  // nombres que se asignarán al modelo
  protected $fillable = ['rol'];

  // se especifican campos que no se quieren asignar al modelo
  protected $guarded = [];
}
