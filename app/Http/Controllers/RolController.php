<?php

namespace cineLaravel\Http\Controllers;

use cineLaravel\Http\Requests\RolFormRequest;
use cineLaravel\Rol;
use DB;
// para hacer algunas redirecciones
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RolController extends Controller
{
  public function __construct()
  {
    // usado para validar
  }

  public function index(Request $request)
  {
    if ($request) {
      // determina el texto de busqueda para filtrar roles
      $query = trim($request->get('searchText'));
      $roles = DB::table('rol')
        ->where('rol', 'LIKE', '%' . $query . '%')
        ->orderBy('rol_id', 'desc')
        ->paginate(7);

      return view('configuracion.rol.index', [
        "roles"      => $roles,
        "searchText" => $query,
      ]);
    }
  }

  public function create()
  {
    // returnar a una vista
    return view('configuracion.rol.create');
  }

  public function store(RolFormRequest $request)
  {
    // almacena el obj de modelo rol en la bd
    // primero se valida
    $rol      = new Rol;
    $rol->rol = $request->get('rol');
    $rol->save();
    // redirecciona al listado de todas las roles
    return Redirect::to('configuracion/rol');
  }

  public function show($id)
  {
    // se llama a un formulario
    return view("configuracion.rol.show", [
      "rol" => Rol::findOrFail($id),
    ]);
  }

  public function edit($id)
  {
    // se llama a un formulario
    return view("configuracion.rol.edit", [
      "rol" => Rol::findOrFail($id),
    ]);
  }

  public function update(RolFormRequest $request, $id)
  {
    $rol      = Rol::findOrFail($id);
    $rol->rol = $request->get('rol');
    $rol->update();
    // muestra una vista
    return Redirect::to('configuracion/rol');
  }

  public function destroy($id)
  {
    // destruir objeto y eliminarlo también de la BD
    $rol = Rol::findOrFail($id);
    $rol->delete();
    // muestra una vista
    return Redirect::to('configuracion/rol');
  }
}
