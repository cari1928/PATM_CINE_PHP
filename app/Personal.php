
<?php

namespace cineLaravel;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
  protected $table      = 'personal'; //referencia a la tabla
  protected $primaryKey = 'personal_id'; //atributo primary key
  public $timestamps    = false; //no se harán columnas de actualizado de laravel

  // campos que recibirán un valor
  // nombres que se asignarán al modelo
  protected $fillable = [
    'sucursal_id',
    'empleado_id',
  ];

  // se especifican campos que no se quieren asignar al modelo
  protected $guarded = [];
}
