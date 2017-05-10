<?php

namespace cineLaravel;

use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
  protected $table      = 'colaborador'; //referencia a la tabla
  protected $primaryKey = 'colaborador_id'; //atributo primary key
  public $timestamps    = false; //no se harán columnas de actualizado de laravel

  // campos que recibirán un valor
  // nombres que se asignarán al modelo
  protected $fillable = [
    'nombre',
    'apellidos',
  ];

  // se especifican campos que no se quieren asignar al modelo
  protected $guarded = [];
}
