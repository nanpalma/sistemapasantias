<?php

namespace App\Http\Controllers;

use App\Models\Brigadas;
use App\Models\Materiales;
use App\Models\Stock;
use App\Models\SubBrigadas;
use Illuminate\Http\Request;

class DepArmamentoController extends Controller
{
  public function create_arma()
  {
    return view('content.armamento.form_crear_arma');
  }

  public function list_arma()
  {
    return view('content.armamento.list_armas');
  }

  public function gestion()
  {
    $brigadas = Brigadas::with('subbrigada')->get();
    return view('content.armamento.gestion', compact('brigadas'));
  }

  public function list_material()
  {
    return response()->json(Materiales::all());
  }

  public function list_sub_brigadas($id)
  {
    return response()->json(SubBrigadas::where('brigadas_id', $id)->get());
  }

  public function store_material(Request $request)
  {

    $request->validate([
      'nombre' => 'required',
      'tipo_material_id' => 'required',
    ], [], [
      'nombre' => 'nombre',
      'tipo_material_id' => 'tipo',
    ]);

    if ($request->id) {
      $model = Materiales::findOrFail($request->id);
      $accion = "Editado";
    } else {
      $model = new Materiales;
      $accion = " Creado";
    }

    $model->fill($request->all());
    $model->save();

    return response()->json(['message' => "Material {$accion} correctamente", "data" => $model], 201);
  }

  public function store_gestion_stock(Request $request)
  {
    $request->validate([
      'materiale_id' => 'required',
      'sub_brigada_id' => 'required',
      'toe' => 'required|numeric|gt:-1',
      'dotado' => 'required|numeric|gt:-1',
      'faltan' => 'required|numeric|',
      'operativo' => 'required|numeric|gt:-1',
      'inoperativo' => 'required|numeric|gt:-1',
      // 'observacion' => 'required',
    ], [], [
      'materiale_id' => 'material',
      'sub_brigada_id' => 'área',
      'toe' => 'toe',
      'dotado' => 'dotado',
      'operativo' => 'operativo',
      'inoperativo' => 'inoperativo',
      // 'observacion' => 'inoperativo',
    ]);
    // return response($request);

    if ($request->id == "") {
      if (count(Stock::where('materiale_id', $request->materiale_id)->where('sub_brigada_id', $request->sub_brigada_id)->get())) {
        return response()->json(['message' => "Error, ya el material que deseas agregar se encuentra registrado.", "status" => 422], 201);
      }
    }
    if ($request->toe > 0) {
      if ($request->dotado > $request->toe) {
        return response()->json(['message' => "Error, El valor que estas ingresando del dotado no puede ser mayor a la del toe.", "status" => 422], 201);
      }
    }

    if ($request->id) {
      $model = Stock::findOrFail($request->id);
      $accion = "Editado";
    } else {
      $model = new Stock;
      $accion = " Creado";
    }

    $model->fill($request->all());
    $model->save();

    return response()->json(['message' => "Registro {$accion} correctamente", "data" => $model, "status" => 201], 201);
  }

  public function delete_material(Request $request)
  {

    Materiales::where('id', $request['id'])->delete();
    return response()->json(['success' => 'Material Eliminado Correctamente.', 'status' => 200,], 201);
    // }

  }

  public function delete_material_stock(Request $request)
  {

    Stock::where('id', $request['id'])->delete();
    return response()->json(['success' => 'Material Eliminado Correctamente.', 'status' => 200,], 201);
    // }

  }

  public function edit_material($id)
  {
    $data = Materiales::where('id', $id)->first();
    return response($data);
  }

  public function edit_stock_material($id)
  {
    $data = Stock::where('id', $id)->first();
    return response($data);
  }

  public function brigada_views(Request $request)
  {
    $brigada_id = $request->query('b');
    $a = $request->query('a');
    if ($brigada_id) {
      $brigada = Brigadas::findOrFail($brigada_id);
      $arrayData = [];
      $arrayData2 = [];
      if ($a) {
        $tipo_material = 2;
        $stocks =  Stock::where('brigadas_id', $brigada_id)
          ->where('sub_brigada_id', $a)
          ->whereHas('material', function ($query) use ($tipo_material) {
            $query->where('tipo_material_id', $tipo_material);
          })
          ->get();

        $tipo_material = 1;
        $arrayData2 = Stock::where('brigadas_id', $brigada_id)
          ->where('sub_brigada_id', $a)
          ->whereHas('material', function ($query) use ($tipo_material) {
            $query->where('tipo_material_id', $tipo_material);
          })
          ->get();
        $arrayData =   $stocks;
      } else {
        $tipo_material = 2;
        $stocks = Stock::select('brigadas_id', 'materiale_id', 'observacion')->whereHas('material', function ($query) use ($tipo_material) {
          $query->where('tipo_material_id', $tipo_material);
        })
          ->selectRaw('SUM(toe) as toe')
          ->selectRaw('SUM(dotado) as dotado')
          ->selectRaw('SUM(faltan) as faltan')
          ->selectRaw('SUM(operativo) as operativo')
          ->selectRaw('SUM(inoperativo) as inoperativo')
          ->groupBy('brigadas_id', 'materiale_id', 'observacion')->where('brigadas_id', $brigada_id)
          ->get();
        $arrayData =   $stocks;

        $tipo_material = 1;
        $arrayData2 = Stock::select('brigadas_id', 'materiale_id', 'observacion')->whereHas('material', function ($query) use ($tipo_material) {
          $query->where('tipo_material_id', $tipo_material);
        })
          ->selectRaw('SUM(toe) as toe')
          ->selectRaw('SUM(dotado) as dotado')
          ->selectRaw('SUM(faltan) as faltan')
          ->selectRaw('SUM(operativo) as operativo')
          ->selectRaw('SUM(inoperativo) as inoperativo')
          ->groupBy('brigadas_id', 'materiale_id', 'observacion')->where('brigadas_id', $brigada_id)
          ->get();
      }

      // return response($arrayData);
      return view('content.armamento.gestion_brigada', compact('brigada', 'a', 'arrayData', 'arrayData2'));
    } else {
      abort(404);
    }
  }
}
