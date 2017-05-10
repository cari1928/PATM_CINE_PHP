<?php

namespace cineLaravel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// valida tanto clientes como staff

class PersonaFormRequest extends FormRequest
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
      'nombre'    => 'required|max:50',
      'apellidos' => 'required|max:80',
      'email'     => 'required|max:50|email',
      'username'  => 'required|max:50',
      'edad'      => 'numeric',
      'pass'      => 'required|max:32',
      'tarjeta'   => 'max:18',
    ];
  }
}
