<?php

namespace cineLaravel\Http\Controllers;

use cineLaravel\Http\Requests\RepartoFormRequest;
use cineLaravel\Reparto;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RepartoController extends Controller
{
  public function __construct()
  {
    // usado para validar
  }

  public function index(Request $request)
  {
    if ($request) {
      // determina el texto de busqueda para filtrar reparto
      $query    = trim($request->get('searchText'));
      $repartos = DB::table('reparto as r')
        ->join('colaborador as c', 'r.colaborador_id', '=', 'c.colaborador_id')
        ->join('pelicula as p', 'r.pelicula_id', '=', 'p.pelicula_id')
        ->select(
          'r.reparto_id',
          'c.nombre as colaborador',
          'p.titulo as pelicula',
          'r.puesto')
        ->where('c.nombre', 'LIKE', '%' . $query . '%')
        ->orwhere('p.titulo', 'LIKE', '%' . $query . '%')
        ->orderBy('r.reparto_id', 'desc')
        ->paginate(7);

      return view('almacen.reparto.index', [
        "repartos"   => $repartos,
        "searchText" => $query,
      ]);
    }
  }

  public function create()
  {
    //listado de las colaboradores y peliculas para mostrarlas en un combobox
    $colaboradores = DB::table('colaborador')->get();
    $peliculas     = DB::table('pelicula')->get();
    // returnar a una vista
    return view('almacen.reparto.create', [
      "colaboradores" => $colaboradores,
      "peliculas"     => $peliculas,
    ]);
  }

  public function store(RepartoFormRequest $request)
  {
    // almacena el obj de modelo reparto en la bd
    // primero se valida
    $reparto                 = new Reparto;
    $reparto->colaborador_id = $request->get('colaborador_id');
    $reparto->pelicula_id    = $request->get('pelicula_id');
    $reparto->puesto         = $request->get('puesto');
    $reparto->save();

    // redirecciona al listado de todas las reparto
    return Redirect::to('almacen/reparto');
  }

  public function show($id)
  {
    // se llama a un formulario
    return view("almacen.reparto.show", [
      "reparto" => Reparto::findOrFail($id),
    ]);
  }

  public function edit($id)
  {
    //selecciona una reparto en específico
    $reparto = Reparto::findOrFail($id);
    //también envía el listado colaborador
    $colaboradores = DB::table('colaborador')->get();
    $peliculas     = DB::table('pelicula')->get();

    // se llama a un formulario
    return view("almacen.reparto.edit", [
      "reparto"       => $reparto,
      "colaboradores" => $colaboradores,
      "peliculas"     => $peliculas,
    ]);
  }

  public function update(RepartoFormRequest $request, $id)
  {
    $reparto                 = Reparto::findOrFail($id);
    $reparto->colaborador_id = $request->get('colaborador_id');
    $reparto->pelicula_id    = $request->get('pelicula_id');
    $reparto->puesto         = $request->get('puesto');
    $reparto->update();
    // muestra una vista
    return Redirect::to('almacen/reparto');
  }

  public function destroy($id)
  {
    // destruir objeto y eliminarlo también de la BD
    $reparto = Reparto::findOrFail($id);
    $reparto->delete();
    // muestra una vista
    return Redirect::to('almacen/reparto');
  }
}
