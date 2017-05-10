<?php

namespace cineLaravel\Http\Controllers;

use cineLaravel\Http\Requests\PeliculaFormRequest;
use cineLaravel\Pelicula;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class PeliculaController extends Controller
{
  public function __construct()
  {
    // usado para validar
  }

  public function index(Request $request)
  {
    if ($request) {
      // determina el texto de busqueda para filtrar peliculas
      $query     = trim($request->get('searchText'));
      $peliculas = DB::table('pelicula')
        ->where('titulo', 'LIKE', '%' . $query . '%')
        ->orwhere('descripcion', 'LIKE', '%' . $query . '%')
        ->orwhere('lenguaje', 'LIKE', '%' . $query . '%')
        ->orderBy('pelicula_id', 'desc')
        ->paginate(7);

      return view('almacen.pelicula.index', [
        "peliculas"  => $peliculas,
        "searchText" => $query,
      ]);
    }
  }

  public function create()
  {
    // returnar a una vista
    return view('almacen.pelicula.create');
  }

  public function store(PeliculaFormRequest $request)
  {
    // almacena el obj de modelo pelicula en la bd
    // primero se valida
    $pelicula                = new Pelicula;
    $pelicula->titulo        = $request->get('titulo');
    $pelicula->descripcion   = $request->get('descripcion');
    $pelicula->f_lanzamiento = $request->get('f_lanzamiento');
    $pelicula->lenguaje      = $request->get('lenguaje');
    $pelicula->duracion      = $request->get('duracion');

    if (Input::hasFile('poster')) {
      $file = Input::file('poster');
      $file->move(
        public_path() . '/imagenes/posters/',
        $file->getClientOriginalName()
      );
      $pelicula->poster = $file->getClientOriginalName();
    }

    $pelicula->save();
    // redirecciona al listado de todas las peliculas
    return Redirect::to('almacen/pelicula');
  }

  public function show($id)
  {
    // se llama a un formulario
    return view("almacen.pelicula.show", [
      "pelicula" => Pelicula::findOrFail($id),
    ]);
  }

  public function edit($id)
  {
    // se llama a un formulario
    return view("almacen.pelicula.edit", [
      "pelicula" => Pelicula::findOrFail($id),
    ]);
  }

  public function update(PeliculaFormRequest $request, $id)
  {
    $pelicula                = Pelicula::findOrFail($id);
    $pelicula->titulo        = $request->get('titulo');
    $pelicula->descripcion   = $request->get('descripcion');
    $pelicula->f_lanzamiento = $request->get('f_lanzamiento');
    $pelicula->lenguaje      = $request->get('lenguaje');
    $pelicula->duracion      = $request->get('duracion');

    if (Input::hasFile('poster')) {
      $file = Input::file('poster');
      $file->move(
        public_path() . '/imagenes/posters/',
        $file->getClientOriginalName()
      );
      $pelicula->poster = $file->getClientOriginalName();
    }

    $pelicula->update();
    return Redirect::to('almacen/pelicula'); // muestra una vista
  }

  public function destroy($id)
  {
    // destruir objeto y eliminarlo también de la BD
    $pelicula = Pelicula::findOrFail($id);
    $pelicula->delete();
    // muestra una vista
    return Redirect::to('almacen/pelicula');
  }
}
