<?php

namespace cineLaravel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RepartoFormRequest extends FormRequest
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
      'colaborador_id' => 'required',
      'pelicula_id'    => 'required',
      'puesto'         => 'required|max:20',
    ];
  }
}
