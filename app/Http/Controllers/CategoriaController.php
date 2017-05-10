<?php

namespace cineLaravel\Http\Controllers;

use cineLaravel\Categoria;
use cineLaravel\Http\Requests\CategoriaFormRequest;
use DB;
use Illuminate\Http\Request;
// para hacer algunas redirecciones
use Illuminate\Support\Facades\Redirect;

class CategoriaController extends Controller
{
  public function __construct()
  {
    // usado para validar
  }

  public function index(Request $request)
  {
    if ($request) {
      // determina el texto de busqueda para filtrar categorias
      $query      = trim($request->get('searchText'));
      $categorias = DB::table('categoria')
        ->where('categoria', 'LIKE', '%' . $query . '%')
        ->orderBy('categoria_id', 'desc')
        ->paginate(7);

      return view('almacen.categoria.index', [
        "categorias" => $categorias,
        "searchText" => $query,
      ]);
    }
  }

  public function create()
  {
    // returnar a una vista
    return view('almacen.categoria.create');
  }

  public function store(CategoriaFormRequest $request)
  {
    // almacena el obj de modelo categoria en la bd
    // primero se valida
    $categoria            = new Categoria;
    $categoria->categoria = $request->get('categoria');
    $categoria->save();
    // redirecciona al listado de todas las categorias
    return Redirect::to('almacen/categoria');
  }

  public function show($id)
  {
    // se llama a un formulario
    return view("almacen.categoria.show", [
      "categoria" => Categoria::findOrFail($id),
    ]);
  }

  public function edit($id)
  {
    // se llama a un formulario
    return view("almacen.categoria.edit", [
      "categoria" => Categoria::findOrFail($id),
    ]);
  }

  public function update(CategoriaFormRequest $request, $id)
  {
    $categoria            = Categoria::findOrFail($id);
    $categoria->categoria = $request->get('categoria');
    $categoria->update();
    // muestra una vista
    return Redirect::to('almacen/categoria');
  }

  public function destroy($id)
  {
    // destruir objeto y eliminarlo también de la BD
    $categoria = Categoria::findOrFail($id);
    $categoria->delete();
    // muestra una vista
    return Redirect::to('almacen/categoria');
  }
}
