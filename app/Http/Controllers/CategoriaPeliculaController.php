<?php

namespace cineLaravel\Http\Controllers;

use cineLaravel\CategoriaPelicula;
use cineLaravel\Http\Requests\CategoriaPeliculaFormRequest;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoriaPeliculaController extends Controller
{
  public function __construct()
  {
    // usado para validar
  }

  public function index(Request $request)
  {
    if ($request) {
      // determina el texto de busqueda para filtrar categoria_peliculas
      $query               = trim($request->get('searchText'));
      $categoria_peliculas = DB::table('categoria_pelicula as cp')
        ->join('categoria as c', 'cp.categoria_id', '=', 'c.categoria_id')
        ->join('pelicula as p', 'cp.pelicula_id', '=', 'p.pelicula_id')
        ->select('cp.categoria_pelicula_id', 'c.categoria', 'p.titulo as pelicula')
        ->where('c.categoria', 'LIKE', '%' . $query . '%')
        ->orwhere('p.titulo', 'LIKE', '%' . $query . '%')
        ->orderBy('cp.categoria_pelicula_id', 'desc')
        ->paginate(7);

      return view('almacen.categoria_pelicula.index', [
        "categoria_peliculas" => $categoria_peliculas,
        "searchText"          => $query,
      ]);
    }
  }

  public function create()
  {
    //listado de las categorias y peliculas para mostrarlas en un combobox
    $categorias = DB::table('categoria')->get();
    $peliculas  = DB::table('pelicula')->get();
    // returnar a una vista
    return view('almacen.categoria_pelicula.create', [
      "categorias" => $categorias,
      "peliculas"  => $peliculas,
    ]);
  }

  public function store(CategoriaPeliculaFormRequest $request)
  {
    // almacena el obj de modelo categoria_pelicula en la bd
    // primero se valida
    $categoria_pelicula               = new CategoriaPelicula;
    $categoria_pelicula->categoria_id = $request->get('categoria_id');
    $categoria_pelicula->pelicula_id  = $request->get('pelicula_id');
    $categoria_pelicula->save();

    // redirecciona al listado de todas las categoria_peliculas
    return Redirect::to('almacen/categoria_pelicula');
  }

  public function show($id)
  {
    // se llama a un formulario
    return view("almacen.categoria_pelicula.show", [
      "categoria_pelicula" => CategoriaPelicula::findOrFail($id),
    ]);
  }

  public function edit($id)
  {
    //selecciona una categoria_pelicula en específico
    $categoria_peliculas = CategoriaPelicula::findOrFail($id);
    //también envía el listado categoria
    $categorias = DB::table('categoria')->get();
    $peliculas  = DB::table('pelicula')->get();

    // se llama a un formulario
    return view("almacen.categoria_pelicula.edit", [
      "categoria_pelicula" => $categoria_peliculas,
      "categorias"         => $categorias,
      "peliculas"          => $peliculas,
    ]);
  }

  public function update(CategoriaPeliculaFormRequest $request, $id)
  {
    $categoria_pelicula               = CategoriaPelicula::findOrFail($id);
    $categoria_pelicula->categoria_id = $request->get('categoria_id');
    $categoria_pelicula->pelicula_id  = $request->get('pelicula_id');
    $categoria_pelicula->update();
    // muestra una vista
    return Redirect::to('almacen/categoria_pelicula');
  }

  public function destroy($id)
  {
    // destruir objeto y eliminarlo también de la BD
    $categoria_pelicula = CategoriaPelicula::findOrFail($id);
    $categoria_pelicula->delete();
    // muestra una vista
    return Redirect::to('almacen/categoria_pelicula');
  }
}
