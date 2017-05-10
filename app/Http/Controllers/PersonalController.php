<?php

namespace cineLaravel\Http\Controllers;

use cineLaravel\Http\Requests\PersonalFormRequest;
use cineLaravel\Personal;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PersonalController extends Controller
{
  public function __construct()
  {
    // usado para validar
  }

  public function index(Request $request)
  {
    if ($request) {
      // determina el texto de busqueda para filtrar personales
      $query      = trim($request->get('searchText'));
      $personales = DB::table('personal as per')
        ->join('persona as p', 'per.empleado_id', '=', 'p.persona_id')
        ->join('sucursal as s', 'per.sucursal_id', '=', 's.sucursal_id')
        ->select(
          'per.personal_id',
          'p.nombre',
          'p.apellidos',
          's.pais',
          's.ciudad',
          's.direccion')
        ->where('p.nombre', 'LIKE', '%' . $query . '%')
        ->orwhere('p.apellidos', 'LIKE', '%' . $query . '%')
        ->orwhere('s.pais', 'LIKE', '%' . $query . '%')
        ->orwhere('s.ciudad', 'LIKE', '%' . $query . '%')
        ->orwhere('s.direccion', 'LIKE', '%' . $query . '%')
        ->orderBy('per.personal_id', 'desc')
        ->paginate(7);

      return view('configuracion.personal.index', [
        "personales" => $personales,
        "searchText" => $query,
      ]);
    }
  }

  public function create()
  {
    //listado de los empleados y sucursales para mostrarlas en un combobox
    $empleados = DB::table('privilegio as pr')
      ->join('persona as p', 'pr.persona_id', '=', 'p.persona_id')
      ->join('rol as r', 'pr.rol_id', '=', 'r.rol_id')
      ->select(
        'p.persona_id',
        'p.nombre',
        'p.apellidos',
      )
      ->where('r.rol', '=', 'Empleado')
      ->orderBy('p.persona_id', 'desc')->get();
    $peliculas = DB::table('pelicula')->orderBy('pelicula_id', 'desc')->get();
    // returnar a una vista
    return view('configuracion.personal.create', [
      "empleados" => $empleados,
      "peliculas" => $peliculas,
    ]);
  }

  public function store(PersonalFormRequest $request)
  {
    // configuraciona el obj de modelo personal en la bd
    // primero se valida
    $personal              = new Personal;
    $personal->empleado_id = $request->get('empleado_id');
    $personal->sucursal_id = $request->get('sucursal_id');
    $personal->save();
    // redirecciona al listado de todas las personales
    return Redirect::to('configuracion/personal');
  }

  public function show($id)
  {
    // se llama a un formulario
    return view("configuracion.personal.show", [
      "personal" => Personal::findOrFail($id),
    ]);
  }

  public function edit($id)
  {
    // se llama a un formulario
    return view("configuracion.personal.edit", [
      "personal" => Personal::findOrFail($id),
    ]);
  }

  public function update(PersonalFormRequest $request, $id)
  {
    $personal              = Personal::findOrFail($id);
    $personal->empleado_id = $request->get('empleado_id');
    $personal->sucursal_id = $request->get('sucursal_id');
    $personal->update();
    // muestra una vista
    return Redirect::to('configuracion/personal');
  }

  public function destroy($id)
  {
    // destruir objeto y eliminarlo también de la BD
    $personal = Personal::findOrFail($id);
    $personal->delete();
    // muestra una vista
    return Redirect::to('configuracion/personal');
  }
}
