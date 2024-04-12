<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehiculoZodi extends Model
{
  use HasFactory;
  protected $fillable = [
    'id_departamento',
    'marca',
    'modelo',
    'color',
    'placa',
    'serial_chasis',
    'serial_motor',
    'ubicacion',
    'operativo',
    'inoperativo',
    'status',
  ];
}
