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


  Route::post('/departamento/material/store', [App\Http\Controllers\DepArmamentoController::class, 'store_material'])->name('armamento.material.store');

  Route::get('/departamento/material/list', [App\Http\Controllers\DepArmamentoController::class, 'list_material'])->name('armamento.material.list');
  Route::get('/departamento/sub_brigadas/list/{id}', [App\Http\Controllers\DepArmamentoController::class, 'list_sub_brigadas'])->name('armamento.material.list');
  Route::delete('/departamento/material/delet/{id}', [App\Http\Controllers\DepArmamentoController::class, 'delete_material'])->name('armamento.material.delete');
  Route::get('/departamento/material/edit/{id}', [App\Http\Controllers\DepArmamentoController::class, 'edit_material'])->name('armamento.material.edit');
  Route::get('/departamento/gestion', [App\Http\Controllers\DepArmamentoController::class, 'gestion'])->name('armamento.gestion');
  Route::get('/departamento/gestion/views', [App\Http\Controllers\DepArmamentoController::class, 'brigada_views'])->name('armamento.gestion.views');
  Route::post('/departamento/gestion/store', [App\Http\Controllers\DepArmamentoController::class, 'store_gestion_stock'])->name('armamento.gestion.store');
  Route::get('/departamento/gestion/edit/{id}', [App\Http\Controllers\DepArmamentoController::class, 'edit_stock_material'])->name('armamento.gestion.edit');
  Route::delete('/departamento/gestion/delet_stock/{id}', [App\Http\Controllers\DepArmamentoController::class, 'delete_material_stock'])->name('armamento.gestion.delete');
  /**_----------------------------------------End Departamento de armamentos_---------------------------------------- */

  Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
