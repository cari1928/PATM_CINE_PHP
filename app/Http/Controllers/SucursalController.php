<?php

namespace cineLaravel\Http\Controllers;

use cineLaravel\Http\Requests\SucursalFormRequest;
use cineLaravel\Sucursal;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SucursalController extends Controller
{
  public function __construct()
  {
    // usado para validar
  }

  public function index(Request $request)
  {
    if ($request) {
      // determina el texto de busqueda para filtrar sucursales
      $query      = trim($request->get('searchText'));
      $sucursales = DB::table('sucursal')
        ->where('pais', 'LIKE', '%' . $query . '%')
        ->orwhere('ciudad', 'LIKE', '%' . $query . '%')
        ->orwhere('direccion', 'LIKE', '%' . $query . '%')
        ->orderBy('sucursal_id', 'desc')
        ->paginate(7);

      return view('configuracion.sucursal.index', [
        "sucursales" => $sucursales,
        "searchText" => $query,
      ]);
    }
  }

  public function create()
  {
    // returnar a una vista
    return view('configuracion.sucursal.create');
  }

  public function store(SucursalFormRequest $request)
  {
    // configuraciona el obj de modelo sucursal en la bd
    // primero se valida
    $sucursal            = new Sucursal;
    $sucursal->pais      = $request->get('pais');
    $sucursal->ciudad    = $request->get('ciudad');
    $sucursal->direccion = $request->get('direccion');
    $sucursal->latitud   = $request->get('latitud');
    $sucursal->longitud  = $request->get('longitud');
    $sucursal->save();
    // redirecciona al listado de todas las sucursales
    return Redirect::to('configuracion/sucursal');
  }

  public function show($id)
  {
    // se llama a un formulario
    return view("configuracion.sucursal.show", [
      "sucursal" => Sucursal::findOrFail($id),
    ]);
  }

  public function edit($id)
  {
    // se llama a un formulario
    return view("configuracion.sucursal.edit", [
      "sucursal" => Sucursal::findOrFail($id),
    ]);
  }

  public function update(SucursalFormRequest $request, $id)
  {
    $sucursal            = Sucursal::findOrFail($id);
    $sucursal->pais      = $request->get('pais');
    $sucursal->ciudad    = $request->get('ciudad');
    $sucursal->direccion = $request->get('direccion');
    $sucursal->latitud   = $request->get('latitud');
    $sucursal->longitud  = $request->get('longitud');
    $sucursal->update();
    // muestra una vista
    return Redirect::to('configuracion/sucursal');
  }

  public function destroy($id)
  {
    // destruir objeto y eliminarlo también de la BD
    $sucursal = Sucursal::findOrFail($id);
    $sucursal->delete();
    // muestra una vista
    return Redirect::to('configuracion/sucursal');
  }
}
