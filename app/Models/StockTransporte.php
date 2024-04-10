<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockTransporte extends Model
{
  use HasFactory;
  protected $fillable = [
    'id_departamento',
    'vehiculo_id',
    'brigadas_id',
    'operativo',
    'reparado',
    'inoperativo',
    'observacion',
    'status',
  ];

  public function vehiculos()
  {
    return $this->belongsTo(Vehiculo::class, "vehiculo_id");
  }

  public function brigada()
  {
    return $this->belongsTo(Brigadas::class, "brigadas_id");
  }
}
