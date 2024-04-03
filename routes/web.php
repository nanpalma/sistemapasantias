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
  /**_----------------------------------------End Departamento de armamentos_---------------------------------------- */

  Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
