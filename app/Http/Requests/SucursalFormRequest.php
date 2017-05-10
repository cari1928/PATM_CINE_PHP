<?php

namespace cineLaravel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SucursalFormRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'pais'      => 'required|max:50',
      'ciudad'    => 'required|max:50',
      'direccion' => 'required|max:150',
      'latitud'   => 'numeric',
      'longitud'  => 'numeric',
    ];
  }
}
