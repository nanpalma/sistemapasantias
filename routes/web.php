<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\Analytics;

Auth::routes();

Route::middleware(['auth', 'verified',])->group(function () {
  // Main Page Route
  Route::get('/', [Analytics::class, 'index'])->name('dashboard-analytics');


  /**_----------------------------------------Departamento de armamentos_---------------------------------------- */
  Route::get('/departamento/create-arma', [App\Http\Controllers\DepArmamentoController::class, 'create_arma'])->name('armamento.create');
  Route::get('/departamento/list-arma', [App\Http\Controllers\DepArmamentoController::class, 'list_arma'])->name('armamento.list');
  Route::get('/departamento/zody/list-arma', [App\Http\Controllers\DepArmamentoController::class, 'list_arma_zody'])->name('armamentozody.list');


  Route::post('/departamento/material/store', [App\Http\Controllers\DepArmamentoController::class, 'store_material'])->name('armamento.material.store');
  Route::post('/departamento/material/zody/store', [App\Http\Controllers\DepArmamentoController::class, 'store_material_zody'])->name('armamentozody.material.store');

  Route::get('/departamento/material/list', [App\Http\Controllers\DepArmamentoController::class, 'list_material'])->name('armamento.material.list');
  Route::get('/departamento/material/zody/list', [App\Http\Controllers\DepArmamentoController::class, 'list_material_zody'])->name('armamentozody.material.list');
  Route::get('/departamento/sub_brigadas/list/{id}', [App\Http\Controllers\DepArmamentoController::class, 'list_sub_brigadas'])->name('armamento.material.list');
  Route::delete('/departamento/material/delet/{id}', [App\Http\Controllers\DepArmamentoController::class, 'delete_material'])->name('armamento.material.delete');
  Route::delete('/departamento/material/zody/delet/{id}', [App\Http\Controllers\DepArmamentoController::class, 'delete_material_zody'])->name('armamentozody.material.delete');
  Route::get('/departamento/material/edit/{id}', [App\Http\Controllers\DepArmamentoController::class, 'edit_material'])->name('armamento.material.edit');
  Route::get('/departamento/material/zody/edit/{id}', [App\Http\Controllers\DepArmamentoController::class, 'edit_material_zody'])->name('armamento.material.edit');
  Route::get('/departamento/gestion', [App\Http\Controllers\DepArmamentoController::class, 'gestion'])->name('armamento.gestion');
  Route::get('/departamento/gestion/views', [App\Http\Controllers\DepArmamentoController::class, 'brigada_views'])->name('armamento.gestion.views');
  Route::post('/departamento/gestion/store', [App\Http\Controllers\DepArmamentoController::class, 'store_gestion_stock'])->name('armamento.gestion.store');
  Route::get('/departamento/gestion/edit/{id}', [App\Http\Controllers\DepArmamentoController::class, 'edit_stock_material'])->name('armamento.gestion.edit');
  Route::delete('/departamento/gestion/delet_stock/{id}', [App\Http\Controllers\DepArmamentoController::class, 'delete_material_stock'])->name('armamento.gestion.delete');
  /**_----------------------------------------End Departamento de armamentos_---------------------------------------- */

  /**_----------------------------------------Blindado y Transporte_---------------------------------------- */
  Route::get('/blindado-transporte/list-vehiculos', [App\Http\Controllers\DepTransporteController::class, 'list_transporte'])->name('transporte.list');
  Route::post('/blindado-transporte/vehiculos/store', [App\Http\Controllers\DepTransporteController::class, 'store_transporte'])->name('transporte.vehiculos.store');
  Route::delete('/blindado-transporte/vehiculos/delet/{id}', [App\Http\Controllers\DepTransporteController::class, 'delete_vehiculo'])->name('transporte.vehiculos.delete');
  Route::get('/blindado-transporte/vehiculos/list', [App\Http\Controllers\DepTransporteController::class, 'list_vehiculo'])->name('transporte.vehiculos.list');
  Route::get('/blindado-transporte/vehiculos/edit/{id}', [App\Http\Controllers\DepTransporteController::class, 'edit_vehiculo'])->name('transporte.vehiculos.edit');

  Route::get('/blindado-transporte/gestion', [App\Http\Controllers\DepTransporteController::class, 'gestion'])->name('transporte.gestion');
  Route::get('/blindado-transporte/gestion/views', [App\Http\Controllers\DepTransporteController::class, 'brigada_views'])->name('transporte.gestion.views');
  Route::get('/blindado-transporte/vehiculo/list', [App\Http\Controllers\DepTransporteController::class, 'list_select_vehiculo'])->name('transporte.vehiculo.list');
  Route::post('/blindado-transporte/gestion/store', [App\Http\Controllers\DepTransporteController::class, 'store_gestion_stock'])->name('transporte.gestion.store');
  Route::delete('/blindado-transporte/gestion/delet_stock/{id}', [App\Http\Controllers\DepTransporteController::class, 'delete_material_stock'])->name('transporte.gestion.delete');
  Route::get('/blindado-transporte/gestion/edit/{id}', [App\Http\Controllers\DepTransporteController::class, 'edit_stock_vhiculos'])->name('transporte.gestion.edit');

  Route::get('/blindado-transporte/zodi/list-vehiculos', [App\Http\Controllers\DepTransporteController::class, 'list_transporte_zodi'])->name('transporte.zodi.list');
  Route::post('/blindado-transporte/vehiculoszodi/store', [App\Http\Controllers\DepTransporteController::class, 'store_transporte_zodi'])->name('transporte.vehiculoszodi.store');
  Route::get('/blindado-transporte/vehiculoszosi/list', [App\Http\Controllers\DepTransporteController::class, 'list_vehiculo_zodi'])->name('transporte.vehiculoszodi.list');
  Route::delete('/blindado-transporte/vehiculoszodi/delet/{id}', [App\Http\Controllers\DepTransporteController::class, 'delete_vehiculo_zodi'])->name('transporte.vehiculoszodi.delete');
  Route::get('/blindado-transporte/vehiculoszodi/edit/{id}', [App\Http\Controllers\DepTransporteController::class, 'edit_vehiculo_zodi'])->name('transporte.vehiculoszodi.edit');
  /**_----------------------------------------End Blindado y Transporte_---------------------------------------- */

  Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
