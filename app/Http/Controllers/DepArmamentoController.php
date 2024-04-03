<?php

namespace App\Http\Controllers;

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
}
