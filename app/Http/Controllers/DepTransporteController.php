<?php

namespace App\Http\Controllers;

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
}
