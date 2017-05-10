<?php

namespace cineLaravel\Http\Controllers;

use cineLaravel\Http\Requests\PersonaFormRequest;
use cineLaravel\Persona;
use cineLaravel\Privilegio;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EmpleadoController extends Controller
{
  public function __construct()
  {
    // usado para validar
  }

  public function index(Request $request)
  {
    if ($request) {
      // determina el texto de busqueda para filtrar personas
      $query    = trim($request->get('searchText'));
      $personas = DB::table('privilegio as pr')
        ->join('persona as p', 'pr.persona_id', '=', 'p.persona_id')
        ->join('rol as r', 'pr.rol_id', '=', 'r.rol_id')
        ->select(
          'p.persona_id',
          'p.nombre',
          'p.apellidos',
          'p.email',
          'p.username',
          'p.edad',
          'p.pass',
          'p.tarjeta'
        )
        ->where('p.nombre', 'LIKE', '%' . $query . '%')
        ->where('r.rol', '=', 'Empleado')
        ->orwhere('p.apellidos', 'LIKE', '%' . $query . '%')
        ->where('r.rol', '=', 'Empleado')
        ->orwhere('p.email', 'LIKE', '%' . $query . '%')
        ->where('r.rol', '=', 'Empleado')
        ->orwhere('p.username', 'LIKE', '%' . $query . '%')
        ->where('r.rol', '=', 'Empleado')
        ->orwhere('p.tarjeta', 'LIKE', '%' . $query . '%')
        ->where('r.rol', '=', 'Empleado')
        ->orderBy('p.persona_id', 'desc')
        ->paginate(7);

      return view('configuracion.empleado.index', [
        "personas"   => $personas,
        "searchText" => $query,
      ]);
    }
  }

  public function create()
  {
    // retornar a una vista
    return view('configuracion.empleado.create');
  }

  public function store(PersonaFormRequest $request)
  {
    // almacena el obj de modelo persona en la bd
    // primero se valida
    $persona            = new Persona;
    $persona->nombre    = $request->get('nombre');
    $persona->apellidos = $request->get('apellidos');
    $persona->email     = $request->get('email');
    $persona->username  = $request->get('username');
    $persona->edad      = $request->get('edad');
    $persona->pass      = md5($request->get('pass'));
    $persona->tarjeta   = $request->get('tarjeta');
    $persona->save();

    $privilegio             = new Privilegio;
    $privilegio->rol_id     = 3;
    $privilegio->persona_id = $persona->persona_id;
    $privilegio->save();

    // redirecciona al listado de todas las personas
    return Redirect::to('configuracion/empleado');
  }

  public function show($id)
  {
    // se llama a un formulario
    return view("configuracion.empleado.show", [
      "persona" => Persona::findOrFail($id),
    ]);
  }

  public function edit($id)
  {
    // se llama a un formulario
    return view("configuracion.empleado.edit", [
      "persona" => Persona::findOrFail($id),
    ]);
  }

  public function update(PersonaFormRequest $request, $id)
  {
    $persona            = Persona::findOrFail($id);
    $persona->nombre    = $request->get('nombre');
    $persona->apellidos = $request->get('apellidos');
    $persona->email     = $request->get('email');
    $persona->username  = $request->get('username');
    $persona->edad      = $request->get('edad');

    if ($persona->pass != $request->get('pass')) {
      $persona->pass = md5($request->get('pass'));
    }

    $persona->tarjeta = $request->get('tarjeta');
    $persona->update();

    // muestra una vista
    return Redirect::to('configuracion/empleado');
  }

  public function destroy($id)
  {
    // destruir objeto y eliminarlo también de la BD
    $persona = Persona::findOrFail($id);
    $persona->delete();
    // muestra una vista
    return Redirect::to('configuracion/empleado');
  }
}
