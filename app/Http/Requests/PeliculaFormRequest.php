<?php

namespace cineLaravel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeliculaFormRequest extends FormRequest
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
      'titulo'        => 'required|max:100',
      'descripcion'   => 'max:500',
      'f_lanzamiento' => 'required|date',
      'lenguaje'      => 'required|max:50',
      'duracion'      => 'required|numeric',
      'poster'        => 'required|mimes:jpeg,jpg,bmp,png',
    ];
  }
}
