<?php

namespace cineLaravel\Http\Controllers;

use cineLaravel\Colaborador;
use cineLaravel\Http\Requests\ColaboradorFormRequest;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ColaboradorController extends Controller
{
  public function __construct()
  {
    // usado para validar
  }

  public function index(Request $request)
  {
    if ($request) {
      // determina el texto de busqueda para filtrar colaboradores
      $query         = trim($request->get('searchText'));
      $colaboradores = DB::table('colaborador')
        ->where('nombre', 'LIKE', '%' . $query . '%')
        ->orwhere('apellidos', 'LIKE', '%' . $query . '%')
        ->orderBy('colaborador_id', 'desc')
        ->paginate(7);

      return view('almacen.colaborador.index', [
        "colaboradores" => $colaboradores,
        "searchText"    => $query,
      ]);
    }
  }

  public function create()
  {
    // returnar a una vista
    return view('almacen.colaborador.create');
  }

  public function store(ColaboradorFormRequest $request)
  {
    // almacena el obj de modelo colaborador en la bd
    // primero se valida
    $colaborador            = new Colaborador;
    $colaborador->nombre    = $request->get('nombre');
    $colaborador->apellidos = $request->get('apellidos');
    $colaborador->save();
    // redirecciona al listado de todas las colaboradores
    return Redirect::to('almacen/colaborador');
  }

  public function show($id)
  {
    // se llama a un formulario
    return view("almacen.colaborador.show", [
      "colaborador" => Colaborador::findOrFail($id),
    ]);
  }

  public function edit($id)
  {
    // se llama a un formulario
    return view("almacen.colaborador.edit", [
      "colaborador" => Colaborador::findOrFail($id),
    ]);
  }

  public function update(ColaboradorFormRequest $request, $id)
  {
    $colaborador            = Colaborador::findOrFail($id);
    $colaborador->nombre    = $request->get('nombre');
    $colaborador->apellidos = $request->get('apellidos');
    $colaborador->update();
    // muestra una vista
    return Redirect::to('almacen/colaborador');
  }

  public function destroy($id)
  {
    // destruir objeto y eliminarlo también de la BD
    $colaborador = Colaborador::findOrFail($id);
    $colaborador->delete();
    // muestra una vista
    return Redirect::to('almacen/colaborador');
  }
}
