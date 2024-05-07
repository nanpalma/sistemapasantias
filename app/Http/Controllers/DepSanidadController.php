<?php

namespace App\Http\Controllers;

use App\Models\Hospitales;
use App\Models\MunicipiosHospitales;
use App\Models\StockSanidad;
use Illuminate\Http\Request;

class DepSanidadController extends Controller
{


  public function gestion()
  {
    $brigadas = MunicipiosHospitales::with('hospitales.hospitales_stock')->get();
    return view('content.sanidad.gestion', compact('brigadas'));
  }

  public function hospita_views(Request $request)
  {
    $brigada_id = $request->query('b');
    $a = $request->query('a');
    if ($brigada_id) {
      $brigada = MunicipiosHospitales::findOrFail($brigada_id);
      $arrayData = [];
      $arrayData2 = [];
      $text_table = "";
      if ($a) {
        $hopita = Hospitales::find($a);
        $text_table = $hopita->nombre;
        $arrayData = StockSanidad::with('municipio_hospitales', 'hospitales')->where('municipios_hospitale_id', $brigada->id)->where('hospitale_id', $a)->get();
      } else {
        $text_table = "Todos Los Hopitales";
        $arrayData = StockSanidad::with('municipio_hospitales', 'hospitales')->where('municipios_hospitale_id', $brigada->id)->get();
      }

      // return response($arrayData);
      return view('content.sanidad.gestion_hospitales', compact('brigada', 'a', 'arrayData', 'text_table'));
    } else {
      abort(404);
    }
  }

  public function list_hospitales_selec($id)
  {
    return response()->json(Hospitales::where('municipios_hospitale_id', $id)->get());
  }

  public function store_gestion_stock(Request $request)
  {
    $request->validate([
      'hospitale_id' => 'required',
      'establecimiento' => 'required',
      'parroquia' => 'required',
      'tipo' => 'required',
      'direccion' => 'required',
    ], [], [
      'hospitale_id' => 'área',
      'establecimiento' => 'establecimiento',
      'parroquia' => 'parroquia',
      'tipo' => 'tipo',
      'inoperativo' => 'inoperativo',
      'direccion' => 'dirección',
    ]);
    // return response($request);


    if ($request->id) {
      $model = StockSanidad::findOrFail($request->id);
      $accion = "Editado";
    } else {
      $model = new StockSanidad();
      $accion = " Creado";
    }

    $model->fill($request->all());
    $model->save();

    return response()->json(['message' => "Registro {$accion} correctamente", "data" => $model, "status" => 201], 201);
  }

  public function edit_stock_material($id)
  {
    $data = StockSanidad::where('id', $id)->first();
    return response($data);
  }

  public function delete_material_stock(Request $request)
  {

    StockSanidad::where('id', $request['id'])->delete();
    return response()->json(['success' => 'Registro Eliminado Correctamente.', 'status' => 200,], 201);
    // }

  }
}
