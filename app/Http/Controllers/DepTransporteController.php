<?php

namespace App\Http\Controllers;

use App\Models\Brigadas;
use App\Models\Stock;
use App\Models\StockTransporte;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DepTransporteController extends Controller
{
  public function list_transporte()
  {
    return view('content.transporte.vehiculos');
  }

  public function store_transporte(Request $request)
  {

    $request->validate([
      'nombre' => 'required',
      'placa' =>
      [
        'required',
        Rule::unique('vehiculos', 'placa')->ignore($request->id, 'id')
      ],
      'modelo' => 'required',
    ], [], [
      'nombre' => 'nombre',
      'placa' => 'placa',
      'modelo' => 'modelo',
    ]);

    if ($request->id) {
      $model = Vehiculo::findOrFail($request->id);
      $accion = "Editado";
    } else {
      $model = new Vehiculo;
      $accion = " Creado";
    }

    $model->fill($request->all());
    $model->save();

    return response()->json(['message' => "Vehículo {$accion} correctamente", "data" => $model], 201);
  }
  public function list_vehiculo()
  {
    return response()->json(Vehiculo::all());
  }
  public function delete_vehiculo(Request $request)
  {

    Vehiculo::where('id', $request['id'])->delete();
    return response()->json(['success' => 'Vehículo Eliminado Correctamente.', 'status' => 200,], 201);
    // }

  }

  public function edit_vehiculo($id)
  {
    $data = Vehiculo::where('id', $id)->first();
    return response($data);
  }

  public function gestion()
  {
    $brigadas = Brigadas::with('subbrigada')->get();
    return view('content.transporte.gestion', compact('brigadas'));
  }

  public function brigada_views(Request $request)
  {
    $brigada_id = $request->query('b');
    $a = $request->query('a');
    if ($brigada_id) {
      $brigada = Brigadas::findOrFail($brigada_id);
      $arrayData = [];

      $stocks = StockTransporte::where('brigadas_id', $brigada_id)->with('vehiculos')->get();
      $arrayData =   $stocks;

      // return response($arrayData);
      return view('content.transporte.gestion_brigada', compact('brigada', 'a', 'arrayData'));
    } else {
      abort(404);
    }
  }

  public function list_select_vehiculo()
  {
    return response()->json(Vehiculo::all());
  }

  public function store_gestion_stock(Request $request)
  {
    $request->validate([
      'vehiculo_id' => 'required',
      // 'observacion' => 'required',
    ], [], [
      'vehiculo_id' => 'vehículo',
      // 'observacion' => 'inoperativo',
    ]);
    // return response($request);

    if ($request->id == "") {

      if (count(StockTransporte::where('vehiculo_id', $request->vehiculo_id)->where('brigadas_id', $request->brigadas_id)->get())) {
        return response()->json(['message' => "Error, ya el vehículo que deseas agregar se encuentra registrado.", "status" => 422], 201);
      }
    }


    if ($request->id) {
      $model = StockTransporte::findOrFail($request->id);
      $accion = "Editado";
    } else {
      $model = new StockTransporte;
      $accion = " Creado";
    }

    if ($request->capa_ope == "operativo") {
      $model->operativo = true;
    } else {
      $model->operativo = false;
    }
    if ($request->capa_ope == "inoperativo") {
      $model->inoperativo = true;
    } else {
      $model->inoperativo = false;
    }

    if ($request->capa_ope == "reparado") {
      $model->reparado = true;
    } else {
      $model->reparado = false;
    }

    $model->vehiculo_id = $request->vehiculo_id;
    $model->brigadas_id = $request->brigadas_id;
    $model->observacion = $request->observacion;
    $model->id_departamento = 2;
    $model->save();

    return response()->json(['message' => "Registro {$accion} correctamente", "data" => $model, "status" => 201], 201);
  }

  public function delete_material_stock(Request $request)
  {

    StockTransporte::where('id', $request['id'])->delete();
    return response()->json(['success' => 'Vehículo Eliminado Correctamente.', 'status' => 200,], 201);
    // }

  }
}
